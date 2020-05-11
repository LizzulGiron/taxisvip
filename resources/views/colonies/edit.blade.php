@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Colonias registradas en el sistema</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Actualiza la información correspondiente a las colonias aquí.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <form action="{{url('/colonias/'.$colony->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH')}}
                            <div class="row">
                                <div class="container">
                                    <p>
                                        <b>POR FAVOR INTRODUZCA LOS DATOS QUE HA CONTINUACIÓN SE SOLICITA.</b>
                                    </p>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12"> 
                                    <br>   
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                            </span>
                                            <input type="text" name="name" class="form-control" value="{{$colony->name}}" maxlength="50" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">Horario Inicial</span>
                                            </span>
                                            <input type="time" name="initial_hour" class="form-control" value="{{$colony->initial_hour}}" maxlength="50" step='1' required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">Horario Final</span>
                                            </span>
                                            <input type="time" name="final_hour" class="form-control" value="{{$colony->final_hour}}" maxlength="13" step='1' required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail">Zona</label>
                                        <select class="form-control" name="zone_id">
                                            @foreach($zones as $zone)
                                                <option value="{{$zone->id}}" {{ old('zone_id',$zone->id) == "$colony->zone_id" ? "selected" : "" }} >{{$zone->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                    <input type="submit" value="Actualizar" class="btn btn-warning btn-block">
                                </div>

                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                                    <img src="{{ asset('assets/images/mapa.svg') }}">
                                    <div class="alert alert-warning" role="alert" style="width: 100%;">
                                        <h6 style="color: #856404;border-bottom: 1px solid #856404;text-align:center;"><b>TODOS LOS CAMPOS SON NECESARIOS PARA EL CORRECTO REGISTRO!</b></h6>
                                    </div>
                                </div>
                            </div>
                        </form> 
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