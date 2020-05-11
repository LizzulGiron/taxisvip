<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt;

class UsersController extends Controller
{
    public function index()
    {
        $datos['secretaries'] = DB::table('users')->get();
        return view('secretaries.index',$datos);
    }

    public function create()
    {
        return view('secretaries.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view ('secretaries.edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        $Datos = request()->validate([
            'name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'identity' => ['required',Rule::unique('users', 'identity')->ignore($id),'max:13'],
            'phone' => ['required',Rule::unique('users', 'phone')->ignore($id),'max:8'],
            'email' => 'required',
        ],[
            'name.required' => 'Campo Nombre es obligatorio!',
            'name.max' => 'Campo Nombre solo debe tener 50 caracteres!',
            'last_name.required' => 'Campo Apellido es obligatorio!',
            'last_name.max' => 'Campo Apellido solo debe tener 50 caracteres!',
            'identity.required' => 'Campo Identidad es obligatorio!',
            'identity.unique' => 'El número de Identidad ya fue utilizado!',
            'identity.max' => 'Campo Identidad solo debe tener 5 caracteres!',
            'phone.required' => 'Campo Teléfono es obligatorio!',
            'phone.size' => 'Teléfono tiene que tener 8 numeros!',
            'phone.unique' => 'El número de Teléfono ya fue utilizado!',
            'email.required' => 'Campo Correo es obligatorio!',
        ]);

        User::where('id','=',$id)->update($Datos);

        return redirect('profile/'.$id)->with('notification','Registro actualizado con éxito.');
    }

    public function profile($id){
        $datos['user'] = User::findOrFail($id);
        return view('secretaries.profile',$datos);
    }
}
