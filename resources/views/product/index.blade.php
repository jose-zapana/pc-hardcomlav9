@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModProduct')
    open
@endsection

@section('activeListProduct')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Listado de Productos</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
            </form>
        </div><!-- /.nav-search -->
    </div>
@endsection

@section('content')
    <a href="{{ route('product.create') }}" class="btn btn-success">
        <i class="icon-2x fa fa-plus"></i> Nueva Producto
    </a>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Precio Unitario</th>
            <th>Tienda</th>
            <th>Categorías</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $products as $product )
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->unit_price }}</td>
            <td>{{ $product->shop->name }}</td>
            <td>
                @foreach( $product->categories as $category )
                    <p> {{ $category->name }} </p>
                @endforeach
            </td>
            <td>
                @can('edit_store')
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                @endcan
                @can('destroy_store')
                <a data-delete="{{ $product->id }}" data-description="{{ $product->description }}" data-name="{{ $product->name }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                @endcan
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @can('destroy_store')
    <div id="modalDelete" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmar eliminación</h4>
                </div>
                <form id="formDelete" data-url="{{ route('product.destroy') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="product_id" name="product_id">
                        <p id="nameDelete"></p>
                        <p id="descriptionDelete"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
@endsection

@section('scripts')
    <script src="{{ asset('js/product/index.js') }}"></script>
@endsection