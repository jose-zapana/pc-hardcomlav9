@extends('layouts.appDashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @foreach( $carts as $cart )
                        <p>Carrito: {{ $cart->id }}</p>
                        <p>Total: {{ $cart->total }}</p>
                        <p>Cliente: {{ $cart->customer->user->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

