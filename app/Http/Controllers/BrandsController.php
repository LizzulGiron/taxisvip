<?php

namespace App\Http\Controllers;

use App\Brands;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class BrandsController extends Controller
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
        $datos['brands'] = DB::table('brands')->Paginate(5);
        return view('brands.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
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
            'name' => 'required|max:50|unique:brands,name'
        ],[
            'name.required' => 'Debe introducir un nombre para la nueva marca!',
            'name.unique' => 'La marca ya ha sido registrada!'
        ]);

        Brands::create([
            'name'=> $Datos['name']
        ]);

        return redirect ('marcas/create')->with('notification','Registro almacenado con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brands $colonies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brands::findOrFail($id);

        return view ('brands.edit', compact('brand'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brands $colonies
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $Datos = request()->validate([
            'name' => ['required',Rule::unique('brands', 'name')->ignore($id),'max:45'],
        ],[
            'name.required' => 'Debe introducir un nombre para el nuevo modelo!',
            'name.max' => 'El campo Nombre debe tener un maximo de 45 caracteres!',
            'name.unique' => 'La marca ha sido registrada previamente!',
        ]);

        Brands::where('id','=',$id)->update($Datos);

        return redirect('marcas/'.$id."/edit")->with('notification','Registro actualizado con éxito.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brands  $colonies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brands::destroy($id);
        return redirect('marcas');
    }

}
