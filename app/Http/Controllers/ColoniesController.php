<?php

namespace App\Http\Controllers;

use App\Colonies;
use Illuminate\Http\Request;
use DB;

class ColoniesController extends Controller
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
        $datos['colonies'] = DB::table('zones')
            ->join('colonies', 'colonies.zone_id', '=', 'zones.id')
            ->select('colonies.name','colonies.initial_hour','colonies.final_hour', 'zones.name as zone_name','colonies.id')
            ->paginate(5);
        return view('colonies.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['zones'] = DB::table('zones')->get();
        return view('colonies.create',$datos);
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
            'name' => 'required|max:50',
            'initial_hour' => 'required',
            'final_hour' => ['required','different:initial_hour'],
            'zone_id' => 'required',
        ],[
            'name.required' => 'Debe introducir un nombre para la Colonia!',
            'initial_hour.required' => 'Establezca una hora inicial de acceso a la colonia!',
            'final_hour.required' => 'Establezca una hora final de acceso a la colonia!',
            'final_hour.different' => 'La hora de finalización no puede ser la misma que la de Inicio!',
            'zone_id.required' => 'La Colonia debe pertenecer a una zona!',
        ]);

        Colonies::create([
            'name'=> $Datos['name'],
            'initial_hour'=> $Datos['initial_hour'],
            'final_hour'=> $Datos['final_hour'],
            'zone_id'=> $Datos['zone_id']
        ]);

        return redirect ('colonias/create')->with('notification','La colonia ha sido registrada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colonies  $colonies
     * @return \Illuminate\Http\Response
     */
    public function show(Colonies $colonies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colonies  $colonies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colony = Colonies::findOrFail($id);

        $datos['zones'] = DB::table('zones')->get();

        return view ('colonies.edit', compact('colony'),$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colonies  $colonies
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $Datos = request()->validate([
            'name' => 'required|max:50',
            'initial_hour' => 'required',
            'final_hour' => ['required','different:initial_hour'],
            'zone_id' => 'required',
        ],[
            'name.required' => 'Debe introducir un nombre para la Colonia!',
            'initial_hour.required' => 'Establezca una hora inicial de acceso a la colonia!',
            'final_hour.required' => 'Establezca una hora final de acceso a la colonia!',
            'final_hour.different' => 'La hora de finalización no puede ser la misma que la de Inicio!',
            'zone_id.required' => 'La Colonia debe pertenecer a una zona!',
        ]);

        Colonies::where('id','=',$id)->update($Datos);

        return redirect('colonias/'.$id.'/edit')->with('notification','Registro actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colonies  $colonies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Colonies::destroy($id);
        return redirect('colonias');
    }
}
