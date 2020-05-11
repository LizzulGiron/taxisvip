@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="alert alert-warning" role="alert" style="width: 100%; margin-left: 15px;margin-right: 15px;">
                <h2 style="color: #856404;border-bottom: 1px solid #856404"><b>ACTUALIZACIÓN DE REGISTROS</b></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="container">
                                <p><b>POR FAVOR INTRODUZCA LA INFORMACIÓN QUE ES SOLICITADA EN EL SIGUIENTE FORMULARIO.</b></p>
                            </div>
                            <div class="col-lg-7">
                                <form action="{{url('/recepcionistas')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <br>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">Nombre</span>
                                                    </span>
                                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" maxlength="50">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">Apellido</span>
                                                    </span>
                                                    <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" maxlength="50">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">Identidad</span>
                                                    </span>
                                                    <input type="text" name="identity" class="form-control" value="{{$user->identity}}" maxlength="50">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">Teléfono</span>
                                                    </span>
                                                    <input type="text" name="phone" class="form-control" value="{{$user->phone}}" maxlength="50">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">Correo</span>
                                                    </span>
                                                    <input type="email" name="email" class="form-control" value="{{$user->email}}" maxlength="50">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">Contraseña</span>
                                                    </span>
                                                    <input type="text" name="password" class="form-control" value="{{$user->password}}" maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: right;">
                                        <input type="submit" value="Actualizar" class="btn btn-primary">
                                    </div>
                                </form> 
                            </div>
                            <div class="col-lg-5">
                                <img src="{{ asset('assets/images/secretary.svg') }}" style="width: 100%;margin-bottom: 10px">
                                <div class="alert alert-warning" role="alert" style="width: 100%;">
                                    <h6 style="color: #856404;border-bottom: 1px solid #856404;text-align:center;"><b>TODOS LOS CAMPOS SON NECESARIOS PARA EL CORRECTO REGISTRO!</b></h6>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <p >Atencion!</p>
                        <ol>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif
            </div>
        </div>  
    </div>
</div>
@endsection