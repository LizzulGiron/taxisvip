<?php

namespace App\Http\Controllers;

use DB;
use App\Services;
use App\Drivers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos['services'] = DB::table('services')
            ->join('persons as client', 'client.id', '=', 'services.person_id')
            ->join('drivers','drivers.id','=','services.driver_id')
            ->join('colonies as colonyA', 'colonyA.id', '=', 'services.starting_place')
            ->join('colonies as colonyB', 'colonyB.id', '=', 'services.arrival_place')
            ->join('vehicles', 'vehicles.id', '=', 'drivers.vehicle_id')
            ->join('persons as driver','driver.id','=','drivers.person_id')
            ->select('client.first_name', 'client.last_name', 'client.phone','services.id','services.created_at','drivers.id as driver_id','vehicles.register','services.price','colonyA.name as starting_colony','colonyB.name as arrival_colony','services.state','driver.first_name as first_name_driver','driver.last_name as last_name_driver', 'driver.phone as phone_driver')
            ->orderBy('services.created_at', 'desc')
            ->paginate(10);

        return view('services.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['colonies'] = DB::table('colonies')->get();
        return view('services.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = " ";

        $time = date('H:i:s');

        if(($time >= '17:00:00') && ($time <= '18:00:00')){
            return redirect('carreras/create')->with('notification','Lo sentimos, no hay conductores disponibles.');
        }
        
        $colony_start = DB::table('colonies')->where('id', '=', $request->starting_place)->get();

        foreach ($colony_start as $data_start) {
            $initial_hour_start = $data_start->initial_hour;
            $final_hour_start = $data_start->final_hour;

        }

        $colony_final = DB::table('colonies')->where('id', '=', $request->arrival_place)->get();

        foreach ($colony_final as $data_final) {
            $initial_hour_final = $data_final->initial_hour;
            $final_hour_final = $data_final->final_hour;

        }

        if ($time < $initial_hour_start || $time > $final_hour_start || $time < $initial_hour_final || $time > $final_hour_final) {
            return redirect('carreras/create')->with('notification','Lo sentimos, no tenemos acceso a la ubicación en este horario.');
        }


        $Datos = request()->validate([
            'identity' => [
                'required',
                'size:13',
                Rule::exists('persons')->where(function ($query) {
                    $query->where('role', 'C');
                }),
            ],
            'starting_place' => 'required',
            'arrival_place' => ['required', 'different:starting_place'],
            'url' => ['required', 'url'],
            'mileage' => ['required', 'numeric'],
            'date' => 'required',
            'time' => 'required', 
            'user_id' => 'required',      
        ],[
            'identity.required' => 'El RTN es obligatorio!',
            'identity.exists' => 'Para el correcto registro el cliente debe estar registrado en el sistema!',
            'identity.size' => 'RTN tiene que tener 13 numeros!',
            'starting_place.required' => 'Debe seleccionar el lugar desde donde inicia el servicio!',
            'arrival_place.required' => 'Debe seleccionar el destino de la carrera!',
            'arrival_place.different' => 'El punto de inicio no debe ser el mismo que el destino',
            'url.required' => 'Campo URL es obligatorio!',
            'url.url' => 'Introduzca una url válida!',
            'mileage.required' => 'El Kilometraje es obligatorio!',
            'mileage.numeric' => 'El Kilometraje solo debe contener números!',
            'date.required' => 'La fecha es obligatoria!',
            'time.required' => 'La hora es obligatoria!',
            'user_id.required' => 'El campo usuario es obligatorio!',
        ]);

        $drivers = DB::table('persons')
            ->join('drivers', 'persons.id', '=', 'drivers.person_id')
            ->join('zones', 'zones.id', '=', 'drivers.zone_id')
            ->join('colonies', 'colonies.zone_id', '=', 'zones.id')
            ->select('drivers.id as id','persons.first_name','persons.last_name','persons.phone','drivers.daily_mileage')
            ->where('persons.role', '=', "D")
            ->where('drivers.state_conductor', '=', "A")
            ->where('colonies.id', '=', $request->starting_place)
            ->orderby('daily_mileage','desc')
            ->get();

        foreach ($drivers as $driver) {
            $id = $driver->id;
            $driver_first_name = $driver->first_name;
            $driver_last_name = $driver->last_name;
            $driver_phone = $driver->phone;
        }

        if ($id == " ") {
            return redirect('carreras/create')->with('notification','Lo sentimos, no hay conductores disponibles.');
        }

        $client = DB::table('persons')->where('identity', '=', $request->identity)->get();

        foreach ($client as $data) {
            $person_id = $data->id;
            $client_first_name = $data->first_name;
            $client_last_name = $data->last_name;
            $client_phone = $data->phone;
        }

        if(($time >= '18:00:00') || ($time <= '06:00:00')){
            $price = ($Datos['mileage'] + 1) * 30;
        }else{
            $price = ($Datos['mileage'] + 1) * 15;
        }


        Services::create([
            'url'=> $Datos['url'],
            'driver_id'=> $id,
            'price'=> $price,
            'mileage'=> $Datos['mileage'],
            'state'=> 'A',
            'person_id'=> $person_id,
            'date'=> date('Y-m-d H:i:s'),
            'starting_place'=> $Datos['starting_place'],
            'arrival_place'=> $Datos['arrival_place'],
            'user_id'=> $Datos['user_id'],
        ]);


        $driver = Drivers::findOrFail($id);
        $driver->daily_mileage = $driver->daily_mileage + $request->mileage;
        $driver->state_conductor = 'I';
        $driver->save();

        $detalle = $price.','.$driver_first_name.' '.$driver_last_name.','.$driver_phone.','.$client_first_name.' '.$client_last_name.','.$client_phone;
        return redirect('carreras/create')->with('detalleFactura',$detalle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $service = Services::findOrFail($id);
        $service->state = "I";
        $service->save();

        $driver_id = $service->driver_id;
        $driver = Drivers::findOrFail($driver_id);
        $driver->state_conductor = "A";
        $driver->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $services)
    {
        //
    }
}
