@extends('layouts.appLanding')

@section('activeCart')
    active
@endsection

@section('styles')
    <link href="{{ asset('landing/assets/css/carousel.css') }}" rel="stylesheet">
    <style>
        .fixedTop {
            top: 20px !important;
        }
        .alturaProduct {
            height: 500px !important;
            width: 500px;
        }
    </style>

@endsection

@section('title')
    Unistore | Cart
@endsection

@section('content')
     <div class="box">
        <div class="container">
            <h1>Shopping Cart</h1>
            <hr class="offset-sm">
        </div>
    </div>
    <hr class="offset-md">
    @if( isset($cart) )
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="checkout-cart">
                            <div class="content">
                            @foreach( $cart->products as $product )
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="{{ asset('images/product/'.$product->images[0]->image) }}" alt="HP Chromebook 11"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h2 class="h4 media-heading">{{ $product->name }}</h2>
                                        @foreach( $product->categories as $category )
                                        <label>{{ $category->name }}</label>
                                        @endforeach
                                        <p class="price">S/. {{ $product->unit_price }}</p>
                                    </div>
                                    <div class="controls fixedTop">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-sm" data-url="{{ route('update.cart', [$cart->id, $product->id, "minus"]) }}"  data-cart="{{ $cart->id }}" data-product="{{ $product->id }}" type="button" data-action="minus"><i class="ion-minus-round"></i></button>
                                            </span>
                                            <input type="text" class="form-control input-sm" placeholder="Qty" value="{{ $product->pivot->quantity }}" readonly="">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-sm" data-url="{{ route('update.cart', [$cart->id, $product->id, "plus"]) }}" data-cart="{{ $cart->id }}" data-product="{{ $product->id }}" type="button" data-action="plus"><i class="ion-plus-round"></i></button>
                                            </span>
                                        </div><!-- /input-group -->

                                        <a href="#remove" data-url="{{ route('remove.item', [$cart->id, $product->id]) }}" > <i class="ion-trash-b"></i> Remove </a>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-4">
                <hr class="offset-md visible-sm">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 class="no-margin">Resumen</h2>
                        <hr class="offset-md">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6">
                                    <p id="countProducts">Subtotal ({{$cart->products->count()}} items)</p>
                                </div>
                                <div class="col-xs-6">
                                    <p id="subtotal"><b>S/. {{ $cart->total }}</b></p>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h3 class="no-margin">Total</h3>
                                </div>
                                <div class="col-xs-6">
                                    <h3 class="no-margin" id="total">S/. {{ $cart->total }}</h3>
                                </div>
                            </div>
                        </div>
                        <hr class="offset-md">

                        <a href="{{ route('checkout.order') }}" class="btn btn-primary btn-lg justify"><i class="ion-android-checkbox-outline"></i>&nbsp;&nbsp; Checkout order</a>
                        <hr class="offset-md">

                        <p>Pay your order in the most convenient way</p>
                        <div class="payment-icons">
                            @foreach( $methodPayments as $methodPayment )
                            <img src="{{ asset('images/method_payment/'.$methodPayment->image) }}" alt="{{ $methodPayment->name }}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        No se ha encontrado un carrito de compras
    @endif
    <hr class="offset-lg">
    <hr class="offset-lg">
@endsection

@section('scripts')
    <script src="{{ asset('js/landing/cart.js') }}"></script>
@endsection
