<?php


namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class ModelsController extends Controller
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
        $datos['models'] = DB::table('models')
            ->join('brands', 'brands.id', '=', 'models.brand_id')
            ->select('models.name','brands.name as brand','brands.created_at','models.id')
            ->Paginate(5);
        return view('models.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['brands'] = DB::table('brands')->get();
        return view('models.create',$datos);
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
            'name' => 'required|max:50|unique:models,name',
            'brand_id' => 'required'
        ],[
            'name.required' => 'Debe introducir un nombre para el nuevo modelo!',
            'name.max' => 'El campo Nombre es requerido para el completo registro!',
            'name.unique' => 'El modelo de vehículo ha sido registrada previamente!',
        ]);

        Models::create([
            'name'=> $Datos['name'],
            'brand_id'=> $Datos['brand_id'],
        ]);

        return redirect ('modelos/create')->with('notification','Registro almacenado con éxito.');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colonies  $colonies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Models::findOrFail($id);

        $datos['brands'] = DB::table('brands')->get();

        return view ('models.edit', compact('model'),$datos);
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
            'name' => ['required',Rule::unique('brands', 'name')->ignore($id),'max:45'],
            'brand_id' => 'required'
        ],[
            'name.required' => 'Debe introducir un nombre para el nuevo modelo!',
            'name.max' => 'El campo Nombre debe tener un maximo de 45 caracteres!',
            'name.unique' => 'El modelo de vehículo ha sido registrada previamente!',
        ]);

        Models::where('id','=',$id)->update($Datos);

        return redirect('modelos/'.$id."/edit")->with('notification','Registro actualizado con éxito.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colonies  $colonies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Models::destroy($id);
        return redirect('modelos');
    }
}
