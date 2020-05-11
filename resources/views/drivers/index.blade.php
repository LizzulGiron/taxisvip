@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Conductores registrados en el sistema</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Visualiza aquí la información de los conductores con su correspondiente vehículo registrado.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                @if(session('notification'))
                    <div class="alert alert-success" style="border-left: 4px solid #155724;">
                        <i class="fas fa-check-circle"></i>    {{session('notification')}}
                    </div>
                @endif
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
                                        <th>RTN</th>
										<th>Teléfono</th>
										<th>Placa</th>
                                        <th>Color</th>
										<th>Zona</th>
										<th colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($drivers as $driver)
                                    <tr>
										@if($driver -> state_conductor == 'A')
                                                <td>
                                                    <div class="col-12 col-sm-8 col-lg-6 pt-1" onclick="return desactivar('{{$driver->id}}')">
                                                        <div class="switch-button switch-button-xs switch-button-warning">
                                                            <input type="checkbox" checked="" name="switch{{$loop -> iteration}}" id="switch{{$loop -> iteration}}"><span>
                                                      <label for="switch17"></label></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif

                                            @if($driver -> state_conductor == 'I')
                                                <td>
                                                    <div class="col-12 col-sm-8 col-lg-6 pt-1" onclick="return activar('{{$driver->id}}')">
                                                        <div class="switch-button switch-button-xs">
                                                            <input type="checkbox" name="switch{{$loop -> iteration}}" id="switch{{$loop -> iteration}}">
                                                            <span>
                                                                <label for="switch17"></label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif										<td>{{$driver -> first_name}} {{$driver -> last_name}}</td>
                                        <td>{{$driver -> identity}}</td>
										<td>{{$driver -> phone}}</td>
										<td>{{$driver -> register}}</td>
                                        <td>{{$driver -> color}}</td>
										<td>{{$driver -> name}}</td>
                                        <td>
                                            <div class="btn-group ml-auto">
                                                <a href="{{ url('/usuarios/'.$driver->person_id.'/edit')}}" class="btn btn-sm btn-outline-light">Editar</a>
                                                <form method="post" action="{{url('/conductores/'.$driver->id)}}" style="display: none">
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
                    <div class="card-footer text-center">
                        <br>
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
            location.href='conductores/'+rtn;
        }
    }

    function activar(id){
        Swal.fire({
            title: 'Activar ahora?',
            icon: 'warning',
            showConfirmButton: false,
            showCloseButton: true,
            html:
            '<p><b>Por favor haga click en el botón de Activar</b></p>'+
            '<hr>'+
            '<div class="text-right" style="margin-top:-5px">'+
                '<form action="conductores/'+id+'/activar" method="POST">'+
                    '{{ csrf_field() }}'+
                    '{{ method_field("PATCH")}}'+
                    '<button style="padding:5px 25px;border-radius:3px;font-size:14px;color:#856404" class="btn btn-warning" type="submit" onclick="message()">Activar</button>'+
                '</form>'+
            '</div>'
        })
    }

    function desactivar(id){
        Swal.fire({
            title: 'Desactivar ahora?',
            icon: 'warning',
            showConfirmButton: false,
            showCloseButton: true,
            html:
            '<p><b>Por favor haga click en el botón de Desactivar</b></p>'+
            '<hr>'+
            '<div class="text-right" style="margin-top:-5px">'+
                '<form action="conductores/'+id+'/desactivar" method="POST">'+
                    '{{ csrf_field() }}'+
                    '{{ method_field("PATCH")}}'+
                    '<button style="padding:5px 25px;border-radius:3px;font-size:14px;color:#856404" class="btn btn-warning" type="submit" onclick="message()">Desactivar</button>'+
                '</form>'+
            '</div>'
        })    }

</script>
@endsection
