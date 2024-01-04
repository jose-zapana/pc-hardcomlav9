@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModAddress')
    open
@endsection

@section('activeListAddress')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Mantenedor de Direcciones</li>
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
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $customers as $customer )
        <tr>
            <th scope="row">{{ $customer->id }}</th>
            <td>{{ $customer->user->name }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
                <!--  En la vista shop podremos agregar, modificar y eliminar las direcciones del cliente seleccionado   -->
                <a  href="{{ route('address.show', $customer->id) }}" class="btn btn-warning">
                    <i class="icon-2x fa fa-eye"></i> Ver direcciones
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('scripts')
    <script src="{{ asset('js/address/index.js') }}"></script>
@endsection

