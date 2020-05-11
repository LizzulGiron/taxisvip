@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Detalle de registro</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Visualiza aquí la información al conductor seleccionado.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-2" style="padding-top: 150px">
                        <span>
                            <a href="{{ url('/usuarios')}}" style="font-size: 80px;color: #856404">
                                <i class="fas fa-angle-left"></i>
                            </a>
                        </span>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0"><b>Cliente</b></h4>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    {{ csrf_field() }}
                                    @foreach($client as $data)
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
                                    </div><br>

                                    <a href="{{ url('/usuarios/'.$data->id.'/update')}}" class="btn btn-warning btn-block">Editar</a>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
