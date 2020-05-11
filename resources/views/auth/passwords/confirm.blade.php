@extends('layouts.app')


@section('content')
<div class="container" style="margin-top: 70px">
    <div class="row justify-content-center">
        <br><br><br><br><br><br><br><br>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Confirmar contraseña') }}</div>

                <div class="card-body">
                    {{ __('Por favor confirme su contraseña antes de continuar.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <img src="{{ asset('assets/images/logo.png') }}">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-warning btn-block">
                                {{ __('Confirmar contraseña') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
