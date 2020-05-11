<?php

namespace App\Http\Controllers;

use DB;
use App\Persons;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonsController extends Controller
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
        $datos['clients'] = DB::table('persons')->where('role', '=', "C")->paginate(10);
        return view('persons.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['colonies'] = DB::table('colonies')->get();
        return view('persons.create',$datos);
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
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'phone' => ['required','unique:persons,phone', 'size:8'],
            'identity' => ['required','unique:persons,identity', 'size:13'],
            'option' => 'required'
        ],[
            'first_name.required' => 'Campo Nombre es obligatorio!',
            'first_name.max' => 'Campo Nombre solo debe tener 50 caracteres!',
            'last_name.required' => 'Campo Apellido es obligatorio!',
            'last_name.max' => 'Campo Apellido solo debe tener 50 caracteres!',
            'identity.required' => 'Campo Identidad es obligatorio!',
            'identity.unique' => 'El número de Identidad ya fue utilizado!',
            'identity.size' => 'RTN tiene que tener 14 numeros!',
            'phone.size' => 'Campo Teléfono debe tener 8 caracteres!',
            'phone.unique' => 'El número de Teléfono ya fue utilizado!',
            'phone.required' => 'Campo Teléfono es obligatorio!',
            'option.required' => 'Campo Opcion es obligatorio!',
            
        ]);

        if ($Datos['option'] == 1) {
            Persons::create([
                'first_name'=> $Datos['first_name'],
                'last_name'=> $Datos['last_name'],
                'phone'=> $Datos['phone'],
                'identity'=> $Datos['identity'],
                'role'=> "D"
            ]);

            return redirect ('vehiculos/create');
        }

        if ($Datos['option'] == 2) {
            Persons::create([
                'first_name'=> $Datos['first_name'],
                'last_name'=> $Datos['last_name'],
                'phone'=> $Datos['phone'],
                'identity'=> $Datos['identity'],
                'role'=> "C"
            ]);

            return redirect('clientes/create')->with('notification','El cliente ha sido registrado con éxito.');
        }

        
    }

    public function registerClient(){

        $datos['colonies'] = DB::table('colonies')->get();
        return view('persons.registerClient',$datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persons  $persons
     * @return \Illuminate\Http\Response
     */
    public function show($rtn)
    {
        $client_rtn = '';
        $client =  DB::table('persons')
            ->select('identity')
            ->where('identity','=',$rtn)
            ->get();

        foreach ($client as $data) {
            $client_rtn = $data->identity;
        }

        if ($client_rtn != '') {
            $datos['client'] = DB::table('persons')
                ->select('persons.id','persons.identity','persons.first_name', 'persons.last_name', 'persons.phone')
                ->where('persons.identity','=',$rtn)
                ->get();
            return view('persons.show',$datos);

        }else{
            return redirect('usuarios')->with('search','Lo sentimos, no tenemos ningun cliente registrado con este RTN.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persons  $persons
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Persons::findOrFail($id);

        return view ('persons.edit', compact('person'));
    }


    public function updateRegister($id)
    {
        $person = Persons::findOrFail($id);

        return view ('persons.update', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persons  $persons
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $datosUsuario = request()->except(['_token','_method']);

        $person = Persons::findOrFail($id);

        $Datos = request()->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'identity' => ['required',Rule::unique('persons', 'identity')->ignore($person->id),'max:13'],
            'phone' => ['required',Rule::unique('persons', 'phone')->ignore($person->id),'max:8'],
        ],[
            'first_name.required' => 'Campo Nombre es obligatorio!',
            'first_name.max' => 'Campo Nombre solo debe tener 50 caracteres!',
            'last_name.required' => 'Campo Apellido es obligatorio!',
            'last_name.max' => 'Campo Apellido solo debe tener 50 caracteres!',
            'identity.required' => 'Campo Identidad es obligatorio!',
            'identity.unique' => 'El número de Identidad ya fue utilizado!',
            'identity.max' => 'Campo Identidad solo debe tener 5 caracteres!',
            'phone.required' => 'Campo Teléfono es obligatorio!',
            'phone.size' => 'Teléfono tiene que tener 8 numeros!',
            'phone.unique' => 'El número de Teléfono ya fue utilizado!',
        ]);

        if($datosUsuario["option"] == 1){
            Persons::where('id','=',$id)->update($Datos);

            return redirect('usuarios/'.$id."/update")->with('notification','Registro actualizado con éxito.');;
        }

        if($datosUsuario["option"] == 2){
            Persons::where('id','=',$id)->update($Datos);

            $driver = DB::table('drivers')->where('person_id', '=', $id)->get();

            foreach ($driver as $data) {
                $vehicle_id = $data->vehicle_id;
            }

            return redirect('/vehiculos/'.$vehicle_id.'/edit');
        }


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persons  $persons
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persons $persons)
    {
        //
    }
}
