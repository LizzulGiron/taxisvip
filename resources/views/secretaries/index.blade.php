@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="alert alert-warning" role="alert" style="width: 100%; margin-left: 15px;margin-right: 15px;">
                <h2 style="color: #856404;border-bottom: 1px solid #856404"><b>RECEPCIONISTAS REGISTRADOS EN EL SISTEMA</b></h2>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                	<div class="container">
                		<br>
                		<div class="input-group mb-3">
                            <input type="text" class="form-control">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary">
                                    Buscar
                                </button>
                            </div>
                        </div>
                	</div>
                </div>

                <div class="card">
                	<br>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th>No.</th>
										<th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Identidad</th>
                                        <th>Teléfono</th>
										<th>Correo</th>
										<th>Contraseña</th>
										<th colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($secretaries as $secretarie)
                                    <tr>
										<td>{{$loop -> iteration}}</td>
										<td>{{$secretarie -> name}}</td>
                                        <td>{{$secretarie -> last_name}}</td>
                                        <td>{{$secretarie -> identity}}</td>
                                        <td>{{$secretarie -> phone}}</td>
										<td>{{$secretarie -> email}}</td>
										<td>{{$secretarie -> password}}</td>
										<td>
											<a href="{{ url('/recepcionistas/'.$secretarie->id.'/edit')}}" class="btn btn-primary">Editar</a>
										</td>
										<td>
											<form method="post" action="{{url('/recepcionistas/'.$secretarie->id)}}">
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
                    <div class="card-footer text-center">
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
