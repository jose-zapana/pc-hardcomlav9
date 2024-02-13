@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModMethodShip')
open
@endsection


@section('activeRestoreMethodShip')
active
@endsection

@section('breadcrumbs')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('dashboard') }}">Inicio</a>
        </li>
        <li class="active">Listado de Metodo de Envio Eliminados</li>
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
            <th scope="col">Nombre</th>
            <th scope="col">Image</th>
            <th scope="col">Tienda</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $shops as $shop )
        <tr>
            <th scope="row">{{ $ships->id }}</th>
            <td>{{ $ships->name }}</td>

            <td>
                @if($ships->image)
                <img src="{{ asset('images/method_ship/'.$ships->image) }}" alt="{{ $ships->name }}" width="100px" height="100px">
                @else
                <img src="{{ asset('images/no_image.jpg') }}" alt="No image" width="100px" height="100px">
                @endif
            </td>
            <td>{{ $ships->shop->name }}</td>
            <td>
                @can('update_shipping')
                <a data-edit="{{ $ships->id }}" data-shop="{{ $ships->shop_id }}" data-image="{{ $ships->image }}" data-name="{{ $ships->name }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                @endcan
                @can('delete_shipping')
                <a data-delete="{{ $ships->id }}" data-shop="{{ $ships->shop->name }}" data-image="{{ $ships->image }}" data-name="{{ $ships->name }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
            <form id="formRestore" data-url="{{ route('method_ship.restore') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id_ships" name="id">
                    <h5>¿Está seguro de restaurar esta tienda?</h5>
                    <p id="nameRestore"></p>
                    <p id="imageRestore"></p>
                    <p id="tiendaRestore"></p>
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
<script src="{{ asset('js/method_ship/restore.js') }}"></script>
@endsection