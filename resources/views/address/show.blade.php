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
            <li class="active">Listado de direcciones del cliente</li>
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
	<h2 style="color: #0093ff; text-align: center; font-weight: 700;"> Lista de -DIRECCIONES- del cliente seleccionado: </h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID cliente</th>
            <th scope="col">Dirección</th>
            <th scope="col">País</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Provincia</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $customerAddresses as $customerAddress )
        <tr>
            <th scope="row">{{ $customerAddress->id }}</th>
            <td>{{ $customerAddress->customer_id }}</td>
            <td>{{ $customerAddress->address }}</td>
            <td>{{ $customerAddress->country }}</td>
            <td>{{ $customerAddress->city }}</td>
            <td>{{ $customerAddress->province }}</td>
            <td>
            <!--Validamos si no hay direcciones del cliente no mostrar icono de modificar o eliminar-->
                @if($customerAddress->id)
                    <!--Editamos la dirección de un cliente-->
                    <a data-edit="{{ $customerAddress->id  }}" data-customerid="{{ $customerAddress->customer_id }}" data-address="{{ $customerAddress->address }}" data-country="{{ $customerAddress->country }}" data-city="{{ $customerAddress->city }}" data-province="{{ $customerAddress->province }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                    <!--Eliminamos la direccion de un cliente-->
                    <a data-delete="{{ $customerAddress->id }}" data-address="{{ $customerAddress->address }}" data-country="{{ $customerAddress->country }}" data-city="{{ $customerAddress->city }}" data-province="{{ $customerAddress->province }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                @else
                    
                @endif
                
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">

                <a  data-customer="{{ $customer->id }}" class="btn btn-success">
                    <i class="icon-2x fa fa-plus"></i> Agregar nueva dirección
                </a>
                
                <a href="{{ route('address.index') }}" class="btn btn-danger" >
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    Regresar a Listado de clientes
    			</a>
            </div>
    </div>

    <!--Modal para crear una nueva direccion del cliente-->

    <div id="modalCreate" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nueva Dirección</h4>
                </div>
                <!--a ests ruta se enviara la data-->
                <form method="post" id="formCreate" class="form-horizontal" data-url="{{ route('address.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="address"> Dirección: </label>

                            <div class="col-sm-9">
                                <input type="text" id="address" name="address" class="col-xs-10 col-sm-10" placeholder="Av. Ricardo Palma" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="country"> País: </label>

                            <div class="col-sm-9">
                                <input type="text" id="country" name="country" class="col-xs-10 col-sm-10" placeholder="Ejm: Perú" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="city"> Ciudad: </label>

                            <div class="col-sm-9">
                                <input type="text" id="city" name="city" class="col-xs-10 col-sm-10" placeholder="Ejm: Cusco" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="province"> Provincia: </label>

                            <div class="col-sm-9">
                                <input type="text" id="province" name="province" class="col-xs-10 col-sm-10" placeholder="Ejm: Quillabamba" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="customer_id"> Id Cliente: </label>

                            <div class="col-sm-9">
                                <input type="text" id="customer_id" name="customer_id" class="col-xs-10 col-sm-10"  readonly />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal para modificar una direccion de un cliente-->

    <div id="modalEdit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color: red;font-weight: 600;">Modificar Dirección</h4>
                </div>
                <form id="formEdit" class="form-horizontal" data-url="{{ route('address.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="address_id" id="address_id">
                    <input type="hidden" name="customer_id" id="customer_id">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="addressE"> Dirección: </label>

                            <div class="col-sm-9">
                                <input type="text" id="addressE" name="address" class="col-xs-10 col-sm-10" placeholder="Ejm: Av.Ricardo Palma" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="countryE"> País: </label>

                            <div class="col-sm-9">
                                <input type="text" id="countryE" name="country" class="col-xs-10 col-sm-10" placeholder="Ejm: Perú" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="cityE"> Ciudad: </label>

                            <div class="col-sm-9">
                                <input type="text" id="cityE" name="city" class="col-xs-10 col-sm-10" placeholder="Ejm: Cusco" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="provinceE"> Provincia: </label>

                            <div class="col-sm-9">
                                <input type="text" id="provinceE" name="province" class="col-xs-10 col-sm-10" placeholder="Ejm: La Convención" />
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
    
    <!--Modal para eliminar una dirección de un cliente-->
    <div id="modalDelete" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color: red;font-weight: 600;">Confirmar eliminación</h4>
                </div>
                <form id="formDelete" data-url="{{ route('address.destroy') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="address_id" name="address_id">
                        <label class="col-sm-3 control-label no-padding-right" for="provinceE"> Dirección: </label>
                        <p id="addressDelete"></p>
                        <label class="col-sm-3 control-label no-padding-right" >País: </label>
                        <p id="countryDelete"></p>
                        <label class="col-sm-3 control-label no-padding-right" >Ciudad: </label>
                        <p id="cityDelete"></p>
                        <label class="col-sm-3 control-label no-padding-right" >Provincia: </label>
                        <p id="provinceDelete"></p><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/address/index.js') }}"></script>
@endsection