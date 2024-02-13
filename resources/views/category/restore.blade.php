@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModCategory')
open
@endsection

@section('activeRestoreCategory')
active
@endsection

@section('breadcrumbs')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('dashboard') }}">Inicio</a>
        </li>
        <li class="active">Listado de Categorias Eliminadas</li>
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
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Categoría</th>
            <th scope="col">Descripción</th>
            <th scope="col">Imagen</th>
            <th scope="col">Tienda</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $categories as $category )
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                @if($category->image)
                <img src="{{ asset('images/category/'.$category->image) }}" alt="{{ $category->name }}" width="100px" height="100px">
                @else
                <img src="{{ asset('images/no_image.jpg') }}" alt="No image" width="100px" height="100px">
                @endif
            </td>
            <td>{{ $category->shop->name }}</td>
            <td>
                @can('restore_store')
                <a data-restore="{{ $category->id }}" data-phone="{{ $category->name }}" data-address="{{ $category->description }}" data-name="{{ $category->image }}" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i></a>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@can('restore_store')
<div id="modalRestore" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmar restauración</h4>
            </div>
            <form id="formRestore" data-url="{{ route('category.restore') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="category_id" name="id">
                    <h5>¿Está seguro de restaurar esta tienda?</h5>
                    <p id="nameRestore"></p>
                    <p id="descriptionRestore"></p>
                    <p id="imageRestore"></p>
                    <p id="shopRestore" name="shop"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endcan
@endsection

@section('scripts')
<script src="{{ asset('js/category/restore.js') }}"></script>
@endsection