@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Registra a continuación una colonia.</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Completa el registro ahora.
                    </p>
                </div>
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
                                <form action="{{url('/colonias')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <br>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                        </span>
                                                    </span>
                                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" maxlength="50" placeholder="Nombre" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">Horario Inicial</span>
                                                    </span>
                                                    <input type="time" name="initial_hour" class="form-control" value="{{old('initial_hour')}}" maxlength="50" step='1' min="00:00:00" max="23:59:59" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">Horario Final</span>
                                                    </span>
                                                    <input type="time" name="final_hour" class="form-control" value="{{old('final_hour')}}" maxlength="13" step='1' min="00:00:00" max="23:59:59" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputEmail">Zona</label>
                                                <select class="form-control" name="zone_id">
                                                    @foreach($zones as $zone)
                                                        <option value="{{$zone->id}}">{{$zone->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div><br>
                                        </div>
                                    </div>
                                    <input type="text" name="option" value="2" style="display: none">
                                    <div style="text-align: right;">
                                        <input type="submit" value="Agregar" class="btn btn-brand btn-block">
                                    </div>
                                </form> 
                            </div>
                            <div class="col-lg-5">
                                <img src="{{ asset('assets/images/mapa.svg') }}">
                                <div class="alert alert-warning" role="alert" style="width: 100%;">
                                    <h6 style="color: #856404;border-bottom: 1px solid #856404;text-align:center;"><b>TODOS LOS CAMPOS SON NECESARIOS PARA EL CORRECTO REGISTRO!</b></h6>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
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
            </div>
        </div>  
    </div>
</div>
@endsection