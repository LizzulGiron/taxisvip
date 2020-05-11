@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<?php
    $id = ' ';
    $comision = 0;
    foreach($services as $data){
        $comision = $comision + ($data->price * 0.20);
    }

    $id = $driver_id;
?>
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
       <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Estado de cuenta actual</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Detalle del estado de cuenta actual del conductor.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0"><b>Conductor</b></h4>
                            </div>
                            <div class="card-body">
                                <form action="{{url('/pagos')}}" method="POST">
                                    {{ csrf_field() }}
                                    @foreach($driver as $data)
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">Nombre</label>
                                            <input type="text" class="form-control" value="{{$data->first_name}}" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName">Apellido</label>
                                            <input type="text" class="form-control" value="{{$data->last_name}}" readonly>
                                        </div> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="username">Teléfono</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class=" fas fa-phone"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="username" value="{{$data->phone}}" readonly>
                                        </div>
                                    </div>
                                   <div class="mb-3">
                                        <label for="username">RTN</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-circle"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="identity" value="{{$data->identity}}" readonly>
                                        </div>
                                    </div>
                                    
                                    @endforeach
                                    <hr class="mb-4">
                                    <div class="d-block my-3" style="padding-top:-20px">
                                        @switch($payment)
                                            @case(1)
                                             <div class="custom-control custom-radio">
                                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                                                <label class="custom-control-label" for="credit">
                                                    Pago Diario
                                                </label>
                                                <div>
                                                    <label>
                                                        Período de contabilización
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Desde</label>
                                                        <input type="text" class="form-control" placeholder="" value="{{$startDate}}" name="start_date" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastName">Hasta</label>
                                                        <input type="text" class="form-control" id="lastName" placeholder=""  value="{{$finishDate}}" name="finish_date" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            @break
                                            @case(2)
                                            <div class="custom-control custom-radio">
                                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                                                <label class="custom-control-label" for="credit">
                                                    Pago Semanal
                                                </label>
                                                <div>
                                                    <label>
                                                        Período de contabilización
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Desde</label>
                                                        <input type="text" class="form-control" placeholder="" value="{{$startDate}}" name="start_date" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastName">Hasta</label>
                                                        <input type="text" class="form-control" id="lastName" placeholder=""  value="{{$finishDate}}" name="finish_date" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            @break
                                            @case(3)
                                            <div class="custom-control custom-radio">
                                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                                                <label class="custom-control-label" for="credit">
                                                    Pago Mensual
                                                </label>
                                                <div>
                                                    <label>
                                                        Período de contabilización
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Desde</label>
                                                        <input type="text" class="form-control" placeholder="" value="{{$startDate}}" name="start_date" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastName">Hasta</label>
                                                        <input type="text" class="form-control" id="lastName" placeholder=""  value="{{$finishDate}}" name="finish_date" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            
                                            @break
                                        @endswitch
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex justify-content-between align-items-center mb-0">
                                    <span class="text-muted"><b>Carreras realizadas</b></span>
                                </h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group mb-3">
                                    @foreach($services as $service)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <h6 class="my-0">
                                                {{$service->first_name}}
                                                {{$service->last_name}}
                                            </h6>
                                            <small class="text-muted">
                                                {{$service->created_at}}
                                            </small>
                                        </div>
                                        <span class="text-muted">L {{$service->price}}</span>
                                    </li>
                                    @endforeach
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total Comisión</span>
                                        <strong>
                                            <?php
                                                echo "L ".$comision;
                                            ?>
                                        </strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        @switch($payment)
                            @case(1)
                            <?php
                            echo '
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="d-flex justify-content-between align-items-center mb-0">
                                            <span class="text-muted"><b>Pagos</b></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group mb-2">';
                                        $payment = str_replace("[", "", $pendingPayments);
                                        $payments = str_replace("]", "", $payment);
                                        $array = explode(",", $payments);
                                        for ($i=0; $i < count($array); $i++) { 
                                            $sub = str_replace('"', "", $array[$i]);
                                            if ($sub != " ") {
                                                echo '
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <div>
                                                        <h5 class="my-0"><b>Fecha de pago</b></h5>
                                                        <small class="text-muted">';
                                                echo $sub;

                                                echo    '</small>
                                                        <a href="/pagos/'.$id.'/'.$sub.'" class="btn btn-warning btn-sm">Realizar pago</a>
                                                    </div>
                                                </li>
                                            ';
                                            }
                                        }
                                echo   '</ul>
                                    </div>
                                </div>';
                            ?>                
                            @break
                            @case(2)
                            <?php
                            echo '
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="d-flex justify-content-between align-items-center mb-0">
                                            <span class="text-muted"><b>Pagos</b></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group mb-2">';
                                        $payment = str_replace("[", "", $pendingPayments);
                                        $payments = str_replace("]", "", $payment);
                                        $array = explode(",", $payments);
                                        for ($i=0; $i < count($array); $i++) { 
                                            $sub = str_replace('"', "", $array[$i]);
                                            if ($sub != " ") {
                                                echo '
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <div>
                                                        <h5 class="my-0"><b>Fecha de pago</b></h5>
                                                        <small class="text-muted">';
                                                echo $sub;

                                                echo    '</small>
                                                         <a href="/pagos/'.$id.'/'.$sub.'" class="btn btn-warning btn-sm">Realizar pago</a>
                                                    </div>
                                                </li>
                                            ';
                                            }
                                        }
                                echo   '</ul>
                                    </div>
                                </div>';
                            ?>                   
                            @break
                            @case(3)
                            <?php
                            echo '
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="d-flex justify-content-between align-items-center mb-0">
                                            <span class="text-muted"><b>Pagos</b></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group mb-2">';
                                        $payment = str_replace("[", "", $pendingPayments);
                                        $payments = str_replace("]", "", $payment);
                                        $array = explode(",", $payments);
                                        for ($i=0; $i < count($array); $i++) { 
                                            $sub = str_replace('"', "", $array[$i]);
                                            if ($sub != ' ') {
                                                echo '
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <div>
                                                        <h5 class="my-0"><b>Fecha de pago</b></h5>
                                                        <small class="text-muted">';
                                                echo $sub;

                                                echo    '</small>
                                                         <a href="/pagos/'.$id.'/'.$sub.'" class="btn btn-warning btn-sm">Realizar pago</a>
                                                    </div>
                                                </li>
                                            ';
                                            }
                                        }
                                echo   '</ul>
                                    </div>
                                </div>';
                            ?>                    
                            @break
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
