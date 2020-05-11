@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Carreras registradas en el sistema</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Visualiza aquí la información de las carreras con su correspondiente cliente y condunctor.
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
                                        <th class="border-0">Estado</th>
                                        <th class="border-0">Cliente</th>
                                        <th class="border-0">Télefono Cliente</th>
                                        <th class="border-0">Punto partida</th>
                                        <th class="border-0">Punto destino</th>
                                        <th class="border-0">Precio carrera</th>
                                        <th class="border-0">Conductor</th>
                                        <th class="border-0">Télefono Conductor</th>
                                        <th class="border-0">Placa Vehículo</th>
                                        <th class="border-0">Fecha y hora</th>
                                        <th class="border-0" colspan="2"></th>
                                        <th class="border-0" colspan="2"></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            @if($service -> state == 'A')
                                                <td>
                                                    <div class="col-12 col-sm-8 col-lg-6 pt-1" onclick="return notification('{{$service->id}}')">
                                                        <div class="switch-button switch-button-xs switch-button-warning">
                                                            <input type="checkbox" checked="" name="switch{{$loop -> iteration}}" id="switch{{$loop -> iteration}}"><span>
                                                      <label for="switch17"></label></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif

                                            @if($service -> state == 'I')
                                                <td>
                                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                                        <div class="switch-button switch-button-xs">
                                                            <input type="checkbox" name="switch{{$loop -> iteration}}" id="switch{{$loop -> iteration}}">
                                                            <span>
                                                                <label for="switch17"></label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
											<td>{{$service -> first_name}} {{$service -> last_name}}</td>
											<td>{{$service -> phone}}</td>
											<td>{{$service -> starting_colony}}</td>
											<td>{{$service -> arrival_colony}}</td>
											<td>L {{$service -> price}}</td>
											<td>
												{{$service -> first_name_driver}} {{$service -> last_name_driver}}
											</td>
											<td>{{$service -> phone_driver}}</td>
											<td>{{$service -> register}}</td>
											<td colspan="2">{{$service -> created_at}}</td>
										</tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center" style="padding-left: 200px;padding-right: 200px">
                        <div style="width:100%;text-align: center">
                            {{$services->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function notification(id){
        Swal.fire({
            title: 'Finalizar ahora?',
            icon: 'warning',
            showConfirmButton: false,
            showCloseButton: true,
            html:
            '<p><b>Por favor haga click en el botón de finalizar</b></p>'+
            '<hr>'+
            '<div class="text-right" style="margin-top:-5px">'+
                '<form action="carreras/'+id+'" method="POST">'+
                    '{{ csrf_field() }}'+
                    '{{ method_field("PATCH")}}'+
                    '<button style="padding:5px 25px;border-radius:3px;font-size:14px;color:#856404" class="btn btn-warning" type="submit" onclick="message()">Finalizar</button>'+
                '</form>'+
            '</div>'
            
        })
    }   
</script>
@endsection

