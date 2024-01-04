@extends('layouts.appLanding2')

@section('activeLogin')
    active
@endsection

@section('title')
    Pc-Hard | Accede a tu cuenta
@endsection

@section('content')
<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
        <h1 class="align-center">Recupera tu Contraseña</h1>
        <br>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir una nueva.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="col-sm-12">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autofocus />
            </br>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
