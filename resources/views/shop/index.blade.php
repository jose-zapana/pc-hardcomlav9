@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModShop')
    open
@endsection

@section('activeListShop')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Listado de Tiendas</li>
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
    <table class="table" id="dynamic-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        {{--@foreach( $shops as $shop )
        <tr>
            <th scope="row">{{ $shop->id }}</th>
            <td>{{ $shop->name }}</td>
            <td>{{ $shop->address }}</td>
            <td>{{ $shop->phone }}</td>
            <td>
                @can('edit_store')
                <a href="{{ route('shop.edit', $shop->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                @endcan
                @can('destroy_store')
                <a data-delete="{{ $shop->id }}" data-phone="{{ $shop->phone }}" data-address="{{ $shop->address }}" data-name="{{ $shop->name }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                @endcan
            </td>
        </tr>
        @endforeach--}}
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
                <form id="formDelete" data-url="{{ route('shop.destroy') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="id_shop" name="id">
                        <p id="nameDelete"></p>
                        <p id="addressDelete"></p>
                        <p id="phoneDelete"></p>
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
    <script src="{{ asset('intranet/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/shop/delete.js') }}"></script>
@endsection