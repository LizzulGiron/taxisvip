@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Clientes registrados en el sistema</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Visualiza aquí la información correspondiente a cada uno de los clientes.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                @if(session('search'))
                    <div class="alert alert-danger" style="border-left: 4px solid #721c24;">
                        <i class="fas fa-exclamation-triangle"></i>    {{session('search')}}
                    </div>
                @endif
        		<div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" id="search" placeholder="RTN">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-warning" onclick="search()">Buscar</button>
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
										<th>Teléfono</th>
										<th>RTN</th>
										<th colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                    <tr>
										<td>{{$loop -> iteration}}</td>
										<td>{{$client -> first_name}} {{$client -> last_name}}</td>
										<td>{{$client -> phone}}</td>
										<td>{{$client -> identity}}</td>
                                        <td>
                                            <div class="btn-group ml-auto">
                                                <a href="{{ url('/usuarios/'.$client->id.'/update')}}" class="btn btn-sm btn-outline-light">Editar</a>
                                                <form method="post" action="{{url('/usuarios/'.$client->id)}}" style="display: none">
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
                            {{$clients->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function search(){
        var rtn = document.getElementById('search').value;
        if (rtn != '') {
            location.href='usuarios/'+rtn;
        }
    }
</script>
@endsection
