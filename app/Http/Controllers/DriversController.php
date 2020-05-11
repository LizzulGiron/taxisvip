<?php

namespace App\Http\Controllers;

use App\Drivers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class DriversController extends Controller
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
        $datos['drivers'] = DB::table('drivers')
            ->join('persons', 'persons.id', '=', 'drivers.person_id')
            ->join('vehicles', 'vehicles.id', '=', 'drivers.vehicle_id')
            ->join('zones', 'zones.id', '=', 'drivers.zone_id')
            ->select('drivers.id','drivers.person_id','persons.identity','persons.first_name', 'persons.last_name', 'persons.phone','vehicles.register','vehicles.color','zones.name','drivers.state_conductor')
            ->get();
        return view('drivers.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['zones'] = DB::table('zones')->get();
        return view('drivers.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $person_id = DB::table('persons')->max('id');

        $vehicle_id = DB::table('vehicles')->max('id');

        $Datos = request()->validate([
            'zone_id' => 'required',
            'payment' => 'required',
        ],[
            'zone_id.required' => 'Campo Zona es obligatorio!',
            'payment.required' => 'Campo Pago es obligatorio!',
        ]);

        Drivers::create([
            'zone_id'=> $Datos['zone_id'],
            'vehicle_id'=> $vehicle_id,
            'person_id'=> $person_id,
            'state_conductor'=> "A",
            'payment'=> $Datos['payment'],
            'percentage'=> 0.15,
            'daily_mileage'=> 0,
        ]);
        return redirect('usuarios/create')->with('notification','Conductor registrado con éxito.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function show($rtn)
    {

        $driver_rtn = '';
        $driver =  DB::table('persons')
            ->select('identity')
            ->where('identity','=',$rtn)
            ->get();

        foreach ($driver as $data) {
            $driver_rtn = $data->identity;
        }

        if ($driver_rtn != '') {
            $datos['driver'] = DB::table('drivers')
                ->join('persons', 'persons.id', '=', 'drivers.person_id')
                ->join('vehicles', 'vehicles.id', '=', 'drivers.vehicle_id')
                ->join('zones', 'zones.id', '=', 'drivers.zone_id')
                ->select('drivers.id','drivers.person_id','persons.identity','persons.first_name', 'persons.last_name', 'persons.phone','vehicles.register','vehicles.color','zones.name')
                ->where('persons.identity','=',$rtn)
                ->get();
            return view('drivers.show',$datos);

        }else{
            return redirect('conductores')->with('search','Lo sentimos, no tenemos ningún conductor registrado con este RTN.');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function search($rtn)
    {
        //$driver = Drivers::findOrFail($rtn);
        return view('drivers.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Drivers::findOrFail($id);

        $datos['zones'] = DB::table('zones')->get();

        return view('drivers.edit', compact('driver'),$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $Datos = request()->validate([
            'zone_id' => 'required',
            'payment' => 'required',
        ],[
            'zone_id.required' => 'Campo Zona es obligatorio!',
            'payment.required' => 'Campo Pago es obligatorio!',
        ]);

        Drivers::where('id','=',$id)->update($Datos);

        return redirect('conductores')->with('notification','Registro actualizado con éxito.');;
    }

    public function activar($id){
        $driver = Drivers::findOrFail($id);
        $driver->state_conductor = "A";
        $driver->save();
        return back();
    }

    public function desactivar($id){
        $driver = Drivers::findOrFail($id);
        $driver->state_conductor = "I";
        $driver->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos = DB::table('drivers')->where('id', '=', $id)->get();
        foreach ($datos as $data) {
            $person_id = $data->person_id;
            $vehicle_id = $data->vehicle_id;
        }
        Drivers::destroy($id);
        DB::table('vehicles')->where('id', '=', $vehicle_id)->delete();
        DB::table('persons')->where('id', '=', $person_id)->delete();
        
        return redirect('conductores');
    }
}
