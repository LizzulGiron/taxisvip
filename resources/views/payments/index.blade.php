@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Conductores registrados en el sistema</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Realiza el pago de comisiones correspondientes a cada conductor aquí.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="input-group mb-3" style="display: none">
                    <input type="text" class="form-control">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-warning">Buscar</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th>No.</th>
                                        <th>Nombre</th>
                                        <th>RTN</th>
                                        <th>Teléfono</th>
                                        <th>Placa</th>
                                        <th>Zona</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($drivers as $driver)
                                    <tr>
                                        <td>{{$loop -> iteration}}</td>
                                        <td>{{$driver -> first_name}} {{$driver -> last_name}}</td>
                                        <td>{{$driver -> identity}}</td>
                                        <td>{{$driver -> phone}}</td>
                                        <td>{{$driver -> register}}</td>
                                        <td>{{$driver -> name}}</td>
                                        <td>
                                            <div class="btn-group ml-auto">
                                                <a href="{{ url('/pagos/'.$driver->id)}}" class="btn btn-sm btn-outline-light">Estado de cuenta</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
