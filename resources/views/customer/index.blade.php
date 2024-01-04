@extends('layouts.appDashboard')

@section('openModCustomer')
    open
@endsection

@section('activeListCustomer')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Mantenedor de Clientes</li>
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
    <a id="newCustomer" class="btn btn-success">
        <i class="icon-2x fa fa-plus"></i> Nuevo Cliente
    </a>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">DNI</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>

            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach(  $customers  as  $customer )
            <tr>
                <th scope="row">{{ $customer->id }}</th>
                <th scope="row">{{ $customer->user->name }}</th>
                <th scope="row">{{ $customer->user->dni }}</th>
                <th scope="row">{{ $customer->user->email }}</th>
                <th scope="row">{{ $customer->phone }}</th>


            <td>

                <a data-edit="{{ $customer->user_id }}"  data-dni="{{ $customer->user->dni }}"   data-email="{{ $customer->user->email }}" data-phone="{{ $customer->phone }}" data-name="{{ $customer->user->name }}" data-customer="{{ $customer->id }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                <a data-delete="{{ $customer->user->id }}" data-dni="{{ $customer->user->dni }}" data-email="{{ $customer->user->email }}" data-name="{{ $customer->user->name }}" data-customer_id="{{ $customer->id }}"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
            </td>



            </tr>
        @endforeach
        </tbody>
    </table>

    <div id="modalCreate" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nuevo Cliente</h4>
                </div>
                <form id="formCreate" class="form-horizontal" data-url="{{ route('customer.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="name"> Nombre </label>

                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="col-xs-10 col-sm-10" placeholder="Ejm: Jorge Gonzales" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="name"> Documento de identidad </label>

                            <div class="col-sm-9">
                                <input type="text" id="dni" name="dni" class="col-xs-10 col-sm-10" placeholder="Ejm: 12457896" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="description"> Email </label>

                            <div class="col-sm-9">
                                <input type="email" id="email" name="email" class="col-xs-10 col-sm-10" placeholder="Ejm: user@unistore.com" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="description"> Contraseña </label>

                            <div class="col-sm-9">
                                  <input id="password" type="password" placeholder="Contraseña" class="col-xs-10 col-sm-10" name="password" required autocomplete="new-password">
                             </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="description"> Confirmar contraseña </label>

                            <div class="col-sm-9">
                            <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="col-xs-10 col-sm-10" name="password_confirmation" required autocomplete="new-password"><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="name"> Telefono </label>

                            <div class="col-sm-9">
                                <input type="text" id="phone" name="phone" class="col-xs-10 col-sm-10" placeholder="Ejm: 945612333" required />
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEdit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modificar usuario</h4>
                </div>
                <form id="formEdit" class="form-horizontal" data-url="{{ route('customer.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="nameE"> Nombre </label>

                            <div class="col-sm-9">
                                <input type="text" id="nameE" name="name" class="col-xs-10 col-sm-10" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="dniE"> Documento de Identidad </label>

                            <div class="col-sm-9">
                                <input type="text" id="dniE" name="dni" class="col-xs-10 col-sm-10" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="emailE"> Correo electrónico </label>

                            <div class="col-sm-9">
                                <input type="email" id="emailE" name="email" class="col-xs-10 col-sm-10" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="phoneE"> Telefono </label>

                            <div class="col-sm-9">
                                <input type="text" id="phoneE" name="phone" class="col-xs-10 col-sm-10" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="phoneE"> ID Usuario </label>

                            <div class="col-sm-9">
                                <input type="text" id="customerE" name="customer" class="col-xs-10 col-sm-10" required />
                            </div>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div id="modalDelete" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmar eliminación</h4>
                </div>
                <form id="formDelete" data-url="{{ route('customer.destroy') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="user_id" name="user_id">
                        <input type="hidden" id="customer_id" name="customer_id" />

                        <p id="nameDelete"></p>
                        <p id="emailDelete"></p>
                        <p id="phoneD"></p>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('intranet/assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/customer/index.js') }}"></script>
@endsection