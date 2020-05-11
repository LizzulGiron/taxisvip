@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Actualización de registro.</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        A continuación se le mostrará la información correspondiente al conductor.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
               	<div class="container">
                	<div class="accrodion-regular">
                		<div id="accordion3">
                            <div class="card">
                        		<div class="card-header" id="headingSeven">
                                    <h5 class="mb-0">
                                       <a href="" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven" style="color: rgb(133, 100, 4);font-weight: bold;">
                                       		<span class="fas fa-angle-down mr-3"></span>
                                       		Información Personal
                                       	</a>
                                    </h5>
                            	</div>

                                <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordion3">
                                </div>
							</div>


                        	<div class="card mb-2">
                                <div class="card-header" id="headingEight">
                                    <h5 class="mb-0">       
	                                    <a href="" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight" style="color: rgb(133, 100, 4);font-weight: bold;">
	                                    	<span class="fas fa-angle-down mr-3"></span>
	                                    	Información del Vehículo
	                                    </a>
                                    </h5>
                                </div>
                            </div>

                            <div class="card mb-2 border-3 border-top border-top-primary">
                                <div class="card-header" id="headingNine">
                                    <h5 class="mb-0">
                                    	<a href="" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine" style="color: rgb(133, 100, 4);font-weight: bold;">
                                    		<span class="fas mr-3 fa-angle-up"></span>
                                    		Registro del Conductor
                                    	</a>
                                    </h5>
                               	</div>
                                <div id="collapseNine" class="collapse show" aria-labelledby="headingNine" data-parent="#accordion3" style="">
                                    <div class="card-body">
                                        <form action="{{url('/conductores/'.$driver->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH')}}
                                            <div class="row">
                                                <div class="container">
                                                    <p>
                                                        <b>EL PROCESO DE ACTUALIZACIÓN YA CASI TERMINA. POR FAVOR SELECCIONE LOS ÚLTIMOS CAMPOS</b>
                                                    </p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="container">
                                                        <div class="form-group">
                                                            <br>
                                                            <label for="zone_id">Zona</label>
                                                            <select class="form-control" name="zone_id" value="{{old('zone_id')}}">
                                                                @foreach($zones as $zone)
                                                                <option value="{{$zone->id}}">{{$zone->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="zone_id">Realización de Pago</label>
                                                            <select class="form-control" name="payment" value="{{old('zone_id')}}">
                                                                <option value="1">Diario</option>
                                                                <option value="2">Semanal</option>
                                                                <option value="3">Mensual</option>
                                                            </select>
                                                        </div>

                                                        <input type="submit" value="Actualizar registro" class="btn btn-brand btn-block">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <img src="{{ asset('assets/images/conductor.svg') }}" style="margin-bottom: 10px">
                                                    <div class="alert alert-warning" role="alert" style="width: 100%;">
                                                    <h6 style="color: #856404;border-bottom: 1px solid #856404;text-align:center;"><b>TODOS LOS CAMPOS SON NECESARIOS PARA LA ACTUALIZACION DEL REGISTRO!</b></h6>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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