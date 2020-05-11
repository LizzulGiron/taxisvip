@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Actualización de información</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Por favor edite la información necesaria para realizar la actualización.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('/usuarios/'.$person->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH')}}
                            <div class="row">
                                <div class="container">
                                    <p><b>POR FAVOR INTRODUZCA LA INFORMACIÓN QUE ES SOLICITADA EN EL SIGUIENTE FORMULARIO.</b></p>
                                </div>
                                <div class="col-xl-7">
                                    <br>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-circle"></i>
                                                </span>
                                            </span>
                                            <input type="text" name="first_name" class="form-control" value="{{$person->first_name}}" onkeypress='return validaLetras(event)' maxlength="50" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-circle"></i>
                                                </span>
                                            </span>
                                            <input type="text" name="last_name" class="form-control" value="{{$person->last_name}}" onkeypress='return validaLetras(event)' maxlength="50" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-address-card"></i>
                                                </span>
                                            </span>
                                            <input type="text" name="identity" class="form-control" value="{{$person->identity}}" maxlength="13" onkeypress='return validaNumericos(event)' required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </span>
                                            </span>
                                            <input type="text" name="phone" class="form-control" value="{{$person->phone}}" maxlength="8" onkeypress='return validaNumericos(event)' required>
                                        </div>
                                    </div>
                                    <div style="text-align: right;">
                                        <input type="submit" value="Actualizar" class="btn btn-brand btn-block">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <br>
                                    <img src="{{ asset('assets/images/user.svg') }}" style="margin-bottom: 10px"><br>
                                    <div class="alert alert-warning" role="alert" style="width: 100%;">
                                        <h6 style="color: #856404;border-bottom: 1px solid #856404;text-align:center;"><b>TODOS LOS CAMPOS SON NECESARIOS PARA EL CORRECTO REGISTRO!</b></h6>
                                    </div>
                                </div>

                                <input type="text" name="option" value="1" style="display: none">
                            </div>
                            
                        </form> 
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