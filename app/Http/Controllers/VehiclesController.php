<?php

namespace App\Http\Controllers;

use DB;
use App\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehiclesController extends Controller
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
        $datos['vehicles'] = DB::table('vehicles')
            ->join('brands','brands.id','=','vehicles.brand_id')
            ->join('models','models.id','=','vehicles.model_id')
            ->select('brands.name as brand','models.name as model','vehicles.year','vehicles.register','vehicles.color','vehicles.id')
            ->paginate(5);
        return view('vehicles.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['brands'] = DB::table('brands')
            ->get();

        $datos['models'] = DB::table('models')
            ->get();

        return view('vehicles.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Datos = request()->validate([
            'model_id' => 'required',
            'year' => 'required', 
            'register' => ['required','unique:vehicles,register', 'size:7'],
            'color' => 'required|max:25', 
        ],[
            'model.required' => 'Campo Modelo es obligatorio!',
            'register.required' => 'Campo Placa es obligatorio!',
            'register.unique' => 'El número de Placa ya fue utilizado!',
            'register.size' => 'Placa tiene que tener 7 caracteres!',
            'year.max' => 'Campo Teléfono solo debe tener 4 caracteres!',
            'color.max' => 'Campo Color solo debe tener 25 caracteres!',
            'color.required' => 'Campo Color es obligatorio!',
            
        ]);

        $model = DB::table('models')
            ->select('brand_id')
            ->where('id','=',$Datos['model_id'])
            ->get();

        foreach ($model as $data) {
            $brand_id = $data->brand_id;
        }

        Vehicles::create([
            'brand_id'=> $brand_id,
            'model_id'=> $Datos['model_id'],
            'year'=> $Datos['year'],
            'register'=> $Datos['register'],
            'color'=> $Datos['color']
        ]);

        return redirect ('conductor/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicles $vehicles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicles::findOrFail($id);

        $datos['brands'] = DB::table('brands')
            ->get();

        $datos['models'] = DB::table('models')
            ->get();

        return view ('vehicles.edit', compact('vehicle'),$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $vehicle = Vehicles::findOrFail($id);

        $Datos = request()->validate([
            'model_id' => 'required',
            'register' => ['required',Rule::unique('vehicles', 'register')->ignore($vehicle->id),'max:7'],
            'color' => 'required|max:25',
            'year' => 'required',
        ],[
            'model.required' => 'Campo Modelo es obligatorio!',
            'register.required' => 'Campo Placa es obligatorio!',
            'register.unique' => 'El número de Placa ya fue utilizado!',
            'register.size' => 'El campo Placa tiene que tener 7 caracteres!',
            'year.required' => 'Campo Año es obligatorio!',
            'color.max' => 'Campo Color solo debe tener 25 caracteres!',
            'color.required' => 'Campo Color es obligatorio!',
        ]);

        $model = DB::table('models')
            ->select('brand_id')
            ->where('id','=',$Datos['model_id'])
            ->get();

        foreach ($model as $data) {
            $brand_id = $data->brand_id;
        }

        $vehiculo = Vehicles::findOrFail($id);
        $vehiculo->brand_id = $brand_id;
        $vehiculo->model_id = $Datos['model_id'];
        $vehiculo->year = $Datos['year'];
        $vehiculo->register = $Datos['register'];
        $vehiculo->color = $Datos['color'];
        $vehiculo->save();

        $driver = DB::table('drivers')->where('vehicle_id', '=', $id)->get();

        foreach ($driver as $data) {
            $driver_id = $data->id;
        }

        return redirect('/conductores/'.$driver_id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicles $vehicles)
    {
        //
    }
}
