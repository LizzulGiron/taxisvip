@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Perfil de Usuario</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Visualiza tú información en esta sección.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <div class="user-avatar text-center d-block">
                            <img src="{{ asset('assets/images/icon.svg') }}" style="width: 100%;margin-bottom: 10px">
                        </div>
                        <div class="text-center">
                            <h2 class="font-24 mb-0">{{$user->name}} {{$user->last_name}}</h2>
                            <p>Recepcionista</p>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h3 class="font-16">Información Personal</h3>
                        <div class="">
                            <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>{{$user->email}}</li>
                            <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i>(+504) {{$user->phone}}</li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                @if(session('notification'))
                    <div class="alert alert-success" style="border-left: 4px solid #155724;">
                        <i class="fas fa-check-circle"></i>    {{session('notification')}}
                    </div>
                @endif
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" style="border-left: 4px solid #721c24;">
                            <i class="fas fa-exclamation-triangle"></i>    {{$error}}
                        </div>
                    @endforeach
                @endif
            	<div class="card border-3 border-top border-top-primary">
                    <h5 class="card-header">
                    	<b>Información Personal</b>
                    </h5>
                    <div class="card-body" style="margin-top: -10px">
                        <form action="{{url('/recepcionistas/'.$user->id)}}" method="POST">
                        	{{ csrf_field() }}
                            {{ method_field('PATCH')}}
                            <div class="row">
                                <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-lg" onkeypress='return validaLetras(event)' value="{{$user->name}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Apellido</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control form-control-lg" onkeypress='return validaLetras(event)' value="{{$user->last_name}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Teléfono</label>
                                        <input type="text" name="phone" id="phone" class="form-control form-control-lg" value="{{$user->phone}}" onkeypress='return validaNumericos(event)' maxlength="8" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">RTN</label>
                                        <input type="text" name="identity" id="identity" class="form-control form-control-lg" value="{{$user->identity}}" onkeypress='return validaNumericos(event)' maxlength="13" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Correo</label>
                                        <input type="email" name="email" id="email"  class="form-control form-control-lg" value="{{$user->email}}" required>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-block">Actualizar</button >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	function validaNumericos(event) {
	    if(event.charCode >= 48 && event.charCode <= 57){
	        return true;
	    }
	    return false;      
	};

    function validaLetras(e) {
        key = e.keyCode || e.which

        teclado = String.fromCharCode(key).toLowerCase();

        letras = "abcdefghijklmnñopqrstuvwxyz";

        especiales = "8-37-38-46-164";

        teclado_especial = false;

        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial == true;
                break;
            }
        }

        if (letras.indexOf(teclado)== -1 && !teclado_especial) {
            return false;
        }
    }
</script>
@endsection
