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
                        Visualiza la información correspondiente a las colonias aquí.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        		<div class="input-group mb-3" style="display: none;">
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
                                        <th class="border-0">#</th>
                                        <th class="border-0">Nombre</th>
                                        <th class="border-0">Zona</th>
                                        <th class="border-0">Horario Inicial</th>
                                        <th class="border-0">Horario Final</th>
                                        <th class="border-0" colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($colonies as $colonie)
                                        <tr>
											<td>{{$loop -> iteration}}</td>
											<td>{{$colonie -> name}}</td>
											<td>{{$colonie -> zone_name}}</td>
											<td>{{$colonie -> initial_hour}}</td>
											<td>{{$colonie -> final_hour}}</td>
                                            <td>
                                                <div class="btn-group ml-auto">
                                                    <a href="{{ url('/colonias/'.$colonie->id.'/edit')}}" class="btn btn-sm btn-outline-light">Editar</a>
                                                    <form method="post" action="{{url('/colonias/'.$colonie->id)}}" style="display: none">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE')}}
                                                        <button type="submit" onclick="return confirm('Borrar?')" class="btn btn-sm btn-outline-ligh"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </td>
										</tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center" style="padding-left: 200px;padding-right: 200px">
                        <div style="width:100%;text-align: center">
                            {{$colonies->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

