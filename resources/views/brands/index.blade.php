@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Colonias registradas en el sistema...</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Gestiona la información correspondiente a las colonias aquí.
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
                                        <th class="border-0">Marca</th>
                                        <th class="border-0">Fecha y hora de creación</th>
                                        <th class="border-0" colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                        <tr>
                                            <td>{{$loop -> iteration}}</td>
                                            <td>{{$brand -> name}}</td>
                                            <td>{{$brand -> created_at}}</td>
                                            <td>
                                                <div class="btn-group ml-auto">
                                                    <a href="{{ url('/marcas/'.$brand->id.'/edit')}}" class="btn btn-sm btn-outline-light">Editar</a>
                                                    <button type="submit" onclick="notification('{{$brand->id}}')" class="btn btn-sm btn-outline-ligh" style="display: none">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
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
                            {{$brands->links()}}
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
            title: 'Eliminar el registro?',
            icon: 'warning',
            showConfirmButton: false,
            showCloseButton: true,
            html:
            '<p><b>Por favor haga click en el botón de Eliminar</b></p>'+
            '<hr>'+
            '<div class="text-right" style="margin-top:-5px">'+
                '<form action="marcas/'+id+'" method="POST">'+
                    '{{ csrf_field() }}'+
                    '{{ method_field("DELETE")}}'+
                    '<button style="padding:5px 25px;border-radius:3px;font-size:14px;color:#856404" class="btn btn-warning" type="submit" onclick="message()">Eliminar</button>'+
                '</form>'+
            '</div>'
            
        })
    }   
</script>
@endsection
