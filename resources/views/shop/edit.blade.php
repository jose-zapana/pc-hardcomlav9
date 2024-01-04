@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModShop')
    open
@endsection

@section('activeCreateShop')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Editar tienda</li>
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
    <form class="form-horizontal" id="formEdit" data-url="{{ route('shop.update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $shop->id }}">
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre de Tienda </label>

            <div class="col-sm-9">
                <input type="text" id="name" name="name" placeholder="Ejm: CompuPlaza" class="col-xs-10 col-sm-5" value="{{ $shop->name }}" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dirección de Tienda </label>

            <div class="col-sm-9">
                <input type="text" id="address" name="address" placeholder="Ejm: Av. Perú #123" class="col-xs-10 col-sm-5" value="{{ $shop->address }}" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Teléfono de Tienda </label>

            <div class="col-sm-9">
                <input type="text" id="phone" name="phone" placeholder="Ejm: 965885874" class="col-xs-10 col-sm-5" value="{{ $shop->phone }}" />
            </div>
        </div>

        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                @can('update_store')
                <button class="btn btn-info" type="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Guardar cambios
                </button>
                @endcan
                &nbsp; &nbsp; &nbsp;
                <a href="{{ route('shop.index') }}" class="btn btn-danger" >
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    Regresar
                </a>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/shop/edit.js') }}"></script>
@endsection