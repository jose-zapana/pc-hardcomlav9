@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModShop')
    open
@endsection

@section('activeRestoreShop')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Listado de Tiendas Eliminadas</li>
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
            <th scope="col">Dirección</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $shops as $shop )
        <tr>
            <th scope="row">{{ $shop->id }}</th>
            <td>{{ $shop->name }}</td>
            <td>{{ $shop->address }}</td>
            <td>{{ $shop->phone }}</td>
            <td>
                @can('restore_store')
                <a data-restore="{{ $shop->id }}" data-phone="{{ $shop->phone }}" data-address="{{ $shop->address }}" data-name="{{ $shop->name }}" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i></a>
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
                <form id="formRestore" data-url="{{ route('shop.restore') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="id_shop" name="id">
                        <h5>¿Está seguro de restaurar esta tienda?</h5>
                        <p id="nameRestore"></p>
                        <p id="addressRestore"></p>
                        <p id="phoneRestore"></p>
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
    <script src="{{ asset('js/shop/restore.js') }}"></script>
@endsection