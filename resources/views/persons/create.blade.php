@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Registra a continuación un nuevo usuario</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Primer paso del registro del conductor.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="accrodion-regular">
                    <div id="accordion3">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-header" id="headingSeven">
                                <h5 class="mb-0">
                                   <a href="" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven" style="color: rgb(133, 100, 4);font-weight: bold;">
                                        <span class="fas fa-angle-down mr-3"></span>
                                        Información Personal
                                    </a>
                                </h5>
                            </div>


                            <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordion3">
                                <div class="card-body">
                                    <form action="{{url('/usuarios')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="container">
                                                <p><b>POR FAVOR INTRODUZCA LA INFORMACIÓN QUE ES SOLICITADA EN EL SIGUIENTE FORMULARIO.</b></p>
                                            </div>
                                            <div class="col-lg-7">
                                                <br>
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-user-circle"></i>
                                                            </span>
                                                        </span>
                                                        <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}" maxlength="50" onkeypress='return validaLetras(event)' placeholder="Nombre" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-user-circle"></i>
                                                            </span>
                                                        </span>
                                                        <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}" maxlength="50" onkeypress='return validaLetras(event)' placeholder="Apellido" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="far fa-address-card"></i>
                                                            </span>
                                                        </span>
                                                        <input type="text" name="identity" class="form-control" value="{{old('identity')}}" maxlength="13" onkeypress='return validaNumericos(event)' placeholder="RTN" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-phone"></i>
                                                            </span>
                                                        </span>
                                                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}" maxlength="8" onkeypress='return validaNumericos(event)' placeholder="Teléfono" required>
                                                    </div>
                                                </div>

                                                <div style="text-align: right;">
                                                    <br>
                                                    <input type="text" name="option" value="1" style="display: none">
                                                    <input type="submit" value="Siguiente" class="btn btn-brand btn-block">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <br>
                                                <img src="{{ asset('assets/images/user.svg') }}" style="margin-bottom: 10px"><br>
                                                <div class="alert alert-warning" role="alert" style="width: 100%;">
                                                    <h6 style="color: #856404;border-bottom: 1px solid #856404;text-align:center;"><b>TODOS LOS CAMPOS SON NECESARIOS PARA EL CORRECTO REGISTRO!</b></h6>
                                                </div>
                                            </div>
                                        </div>  
                                    </form> 
                                </div>
                            </div>
                        </div>


                        <div class="card mb-2">
                            <div class="card-header" id="headingEight">
                                <h5 class="mb-0">
                                    <a href="" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" style="color: rgb(133, 100, 4);font-weight: bold;">
                                        <span class="fas fa-angle-down mr-3"></span>
                                        Información del Vehículo
                                    </a>       
                                </h5>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-header" id="headingNine">
                                <h5 class="mb-0">
                                    <a href="" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine" style="color: rgb(133, 100, 4);font-weight: bold;">
                                        <span class="fas fa-angle-down mr-3"></span>
                                        Registro del Conductor
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                @if(session('notification'))
                    <div class="alert alert-success" style="border-left: 4px solid #155724;">
                        <i class="fas fa-check-circle"></i>    {{session('notification')}}
                    </div>
                @endif
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" style="border-left: 4px solid #721c24;">
                            <i class="fas fa-exclamation-triangle"></i>    {{$error}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>  
    </div>
</div>
<script>
    function validaNumericos(event) {
        if(event.charCode >= 48 && event.charCode <= 57){
            return true;
        }
        return false;      
    };
    function validaLetras(e) {
        key = e.keyCode || e.which

        teclado = String.fromCharCode(key).toLowerCase();

        letras = "abcdefghijklmnñopqrstuvwxyz";

        especiales = "8-37-38-46-164";

        teclado_especial = false;

        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial == true;
                break;
            }
        }

        if (letras.indexOf(teclado)== -1 && !teclado_especial) {
            return false;
        }
    }
</script>
@endsection