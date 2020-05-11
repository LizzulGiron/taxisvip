@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 70px">
    <div class="row justify-content-center">
        <br><br><br><br><br><br><br><br>
        <div class="col-md-4 col-xs-8">
            <div class="card">
                <div class="card-header">
                    <span style="color: #856404">Registro</span>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        <img src="{{ asset('assets/images/logo.png') }}">
                        @csrf
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="input-group" style="margin-bottom: 5px">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Nombre" value="{{ old('name') }}" required onkeypress='return validaLetras(event)' autocomplete="name" maxlength="45" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                            </div>
                            <div class="input-group" style="margin-bottom: 5px">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Apellido" value="{{ old('last_name') }}" onkeypress='return validaLetras(event)' maxlength="45" required autocomplete="name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                            </div>
                            <div class="input-group" style="margin-bottom: 5px">
                                <input id="identity" type="text" class="form-control @error('identity') is-invalid @enderror" name="identity" placeholder="RTN" value="{{ old('identity') }}" onkeypress='return validaNumericos(event)' maxlength="13" required autocomplete="name" autofocus>

                                @error('identity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                            </div>
                            <div class="input-group" style="margin-bottom: 5px">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Teléfono" value="{{ old('phone') }}" onkeypress='return validaNumericos(event)' required autocomplete="name" maxlength="8" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                            </div>
                            <div class="input-group" style="margin-bottom: 5px">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror           
                            </div>
                            <div class="input-group" style="margin-bottom: 5px">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror         
                            </div>
                            <div class="input-group" style="margin-bottom: 5px">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme su contraseña" required autocomplete="new-password">         
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="container">
                                <button type="submit" class="btn btn-block btn-warning" style="color: #856404">
                                    Registrarse Ahora
                                </button>
                            </div>
                        </div>
                    </form>
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
        }
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
</div>
@endsection

