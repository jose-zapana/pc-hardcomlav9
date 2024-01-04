@extends('layouts.appLanding2')

@section('activeRegister')
    active
@endsection

@section('title')
    PC-Hard | Registro
@endsection

@section('content')
<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
    <h1 class="align-center">Nueva cuenta</h1>
    <br>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container-fluid">
            <div class="row">
  
                        <!-- Name -->
                        <div class="col-sm-12">
                                        <input id="name" type="text" placeholder="Nombre completo" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus><br>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                        </div>

                        <!-- DNI -->
                        <div class="col-sm-12">
                                        <input id="dni" type="text" placeholder="Documento de Identidad" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" ><br>

                                        @error('dni')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="col-sm-12">
                                        <input id="email" type="email" placeholder="Correo Electrónico" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"><br>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-sm-12">
                                        <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"><br>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-sm-12">
                                        <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password"><br>
                        </div>
                    </div>
            </div>



        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="btn btn-primary">Registrarse</button>

            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Ya estoy registrado?') }}
            </a>
          
        </div>

    </form>
</div>
@endsection

