@extends('layouts.appLanding')

@section('activeShop')
    active
@endsection

@section('styles')
    <link href="{{ asset('landing/assets/css/carousel.css') }}" rel="stylesheet">
    <style>
        .altura {
            height: 450px !important;
        }
        .alturaProduct {
            height: 500px !important;
            width: 500px;
        }
    </style>

@endsection

@section('title')
    Pc-Hard | Producto
@endsection

@section('content')
    <div class="product">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-7">
                    <div class="carousel product" data-count="1" data-current="1">
                        <!-- <button class="btn btn-control"></button> -->

                        <div class="items">
                            @foreach( $product->images as $image )
                            <div class="item active" data-marker="{{$image->id}}">
                                <img src="{{asset('images/product/'.$image->image)}}" alt="{{ $image->alt }}" class="alturaProduct"/>
                            </div>
                            @endforeach
                        </div>

                        <ul class="markers">
                            @foreach( $product->images as $image )
                            <li data-marker="{{$image->id}}" class="active"><img src="{{asset('images/product/'.$image->image)}}" alt="{{ $image->alt }}"/></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5 col-md-5">
                    {{--<img src="{{ asset('images/product/'.$product->images[0]->image) }}" alt="HP" class="brand hidden-xs" />--}}
                    <h1>{{ $product->name }}</h1>

                    <p> &middot; Chrome OS™</p>
                    <p> &middot; Intel® Celeron® processor</p>
                    <p> &middot; Intel HD Graphics</p>

                    <p class="price">S/. {{ $product->unit_price }}</p>
                    <br><br>

                    <button data-url="{{route('add.cart', $product->id)}}" data-product="{{$product->id}}" class="btn btn-primary btn-rounded"> <i class="ion-bag"></i> Add to cart</button>
                </div>
            </div>
            <br><br><br>


            <div class="row">
                <div class="col-sm-7">
                    <h1>{{ $product->name }}</h1>
                    <br>

                    <p>
                        {{ $product->description }}
                    </p>
                    <br>

                    <h2>Especificaciones del producto</h2>
                    <br>
                    @foreach( $product->infos as $info )
                    <div class="row specification">
                        <div class="col-sm-6"> <label>{{$info->specification}}</label> </div>
                        <div class="col-sm-6"> <p>{{$info->content}}</p> </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-sm-5">
                    <my-comments-component v-bind:id_product="{{ json_encode($product->id) }}" >

                    </my-comments-component>
                    <br><br>

                    <div class="talk">
                        <h2 class="h3">¿Tienes alguna duda?</h2>
                        <p>Chat en línea con nuestros Asesores</p>

                        <button class="btn btn-default btn-sm"> <i class="ion-android-contact"></i> Lat's talk </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/landing/detail.js') }}"></script>
@endsection
