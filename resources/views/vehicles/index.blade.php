@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Vehículos registrados en el sistema</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        		<div class="input-group mb-3">
                    <input type="text" class="form-control">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-warning">Buscar</button>
                    </div>
                </div>

                <div class="card">
                	<br><br>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th>No.</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Año</th>
                                        <th>Placa</th>
                                        <th>Color</th>
										<th colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vehicles as $vehicle)
                                    <tr>
										<td>{{$loop -> iteration}}</td>
										<td>{{$vehicle -> brand}}</td>
										<td>{{$vehicle -> model}}</td>
										<td>{{$vehicle -> year}}</td>
                                        <td>{{$vehicle -> register}}</td>
                                        <td>{{$vehicle -> color}}</td>
                                        <td>
                                            <div class="btn-group ml-auto">
                                                <a href="{{ url('/vehiculos/'.$vehicle->id.'/edit')}}" class="btn btn-sm btn-outline-light">Editar</a>
                                            </div>
                                        </td>
										<td style="display: none">
											<form method="post" action="{{url('/vehiculos/'.$vehicle->id)}}">
												{{ csrf_field() }}
												{{ method_field('DELETE')}}
												<button type="submit" onclick="return confirm('Borrar?')" class="btn btn-primary">Eliminar</button>
											</form>
										</td>
									</tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center" style="padding-left: 200px;padding-right: 200px">
                        <div style="width:100%;text-align: center">
                            {{$vehicles->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
