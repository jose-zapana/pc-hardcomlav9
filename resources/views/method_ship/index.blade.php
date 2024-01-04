@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModMethodShip')
    open
@endsection

@section('activeListMethodShip')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Mantenedor de Envios</li>
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
    @can('store_shipping')
    <a id="newMethodShip" class="btn btn-success">
        <i class="icon-2x fa fa-plus"></i> Nuevo Envio
    </a>
    @endcan
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre del envio</th>
            <th scope="col">Imagen</th>
            <th scope="col">Tienda</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach( $ship as $ships )
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
                    <a data-edit="{{ $ships->id }}" data-shop="{{ $ships->shop_id }}" data-image="{{ $ships->image }}"  data-name="{{ $ships->name }}"  class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                    @endcan
                    @can('delete_shipping')
                    <a data-delete="{{ $ships->id }}" data-shop="{{ $ships->shop->name }}" data-image="{{ $ships->image }}"  data-name="{{ $ships->name }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div id="modalCreateShip" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nuevo Envio</h4>
                </div>
                <form id="formCreateShip" class="form-horizontal" data-url="{{ route('method_ship.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="name"> Nombre del envio </label>

                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="col-xs-10 col-sm-10" placeholder="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="image"> Imagen </label>

                            <div class="col-sm-9">
                                <input type="file" id="image" name="image" class="col-xs-10 col-sm-10" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="shop"> Tienda </label>

                            <div class="col-sm-9">
                                <select name="shop" id="shop" class="col-xs-10 col-sm-10">
                                    <option value="">Seleccione...</option>
                                    @foreach( $shops as $shop )
                                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                    @endforeach
                                </select>
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

    <div id="modalEditShip" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modificar Envio</h4>
                </div>
                <form id="formEditShip" class="form-horizontal" data-url="{{ route('method_ship.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="ship_id" id="ship_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="name_edit"> Nombre del envio  </label>

                            <div class="col-sm-9">
                                <input type="text" id="name_edit" name="name" class="col-xs-10 col-sm-10" placeholder="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="image_edit"> Imagen </label>

                            <div class="col-sm-9">
                                <input type="file" id="image_edit" name="image" class="col-xs-10 col-sm-10" />
                                <img src="" id="image-preview" width="100px" height="100px" alt="Imagen previsualizacion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="shop_edit"> Tienda </label>

                            <div class="col-sm-9">
                                <select name="shop" id="shop_edit" class="col-xs-10 col-sm-10">
                                    @foreach( $shops as $shop )
                                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                    @endforeach
                                </select>
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

    <div id="modalDeleteShip" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmar eliminación</h4>
                </div>
                <form id="formDeleteShip" data-url="{{ route('method_ship.destroy') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="ship_id" name="ship_id">
                        <p id="nameDelete"></p>
                        <p id="shopDelete"></p>
                        <img src="" id="imageDelete" alt="Imagen Preview" width="100px" height="100px" >
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
    <script src="{{ asset('js/method_ship/index.js') }}"></script>
@endsection