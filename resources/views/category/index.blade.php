@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModCategory')
open
@endsection

@section('activeListCategory')
active
@endsection

@section('breadcrumbs')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('dashboard') }}">Inicio</a>
        </li>
        <li class="active">Mantenedor de Categorías</li>
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
<a id="newCategory" class="btn btn-success">
    <i class="icon-2x fa fa-plus"></i> Nueva Categoría
</a>
<hr>
<table class="table" id="dynamic-table">
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

                <a data-edit="{{ $category->id }}" data-shop="{{ $category->shop_id }}" data-image="{{ $category->image }}" data-description="{{ $category->description }}" data-name="{{ $category->name }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>

                <a data-delete="{{ $category->id }}" data-shop="{{ $category->shop->name }}" data-image="{{ $category->image }}" data-description="{{ $category->description }}" data-name="{{ $category->name }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>

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
                <h4 class="modal-title">Nueva Categoría</h4>
            </div>
            <form id="formCreate" class="form-horizontal" data-url="{{ route('category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="name"> Categoría </label>

                        <div class="col-sm-9">
                            <input type="text" id="name" name="name" class="col-xs-10 col-sm-10" placeholder="Ejm: Laptops" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="description"> Descripción </label>

                        <div class="col-sm-9">
                            <textarea name="description" id="description" cols="30" rows="10" class="col-xs-10 col-sm-10"></textarea>
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

<div id="modalEdit" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modificar categoría</h4>
            </div>
            <form id="formEdit" class="form-horizontal" data-url="{{ route('category.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="category_id" id="category_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="nameE"> Categoría </label>

                        <div class="col-sm-9">
                            <input type="text" id="nameE" name="name" class="col-xs-10 col-sm-10" placeholder="Ejm: Laptops" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="descriptionE"> Descripción </label>

                        <div class="col-sm-9">
                            <textarea name="description" id="descriptionE" cols="30" rows="5" class="col-xs-10 col-sm-10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="imageE"> Imagen </label>

                        <div class="col-sm-9">
                            <input type="file" id="imageE" name="image" class="col-xs-10 col-sm-10" />
                            <img src="" id="image-preview" width="100px" height="100px" alt="Imagen previsualizacion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="shopE"> Tienda </label>

                        <div class="col-sm-9">
                            <select name="shop" id="shopE" class="col-xs-10 col-sm-10">
                                @foreach( $shops as $shop )
                                <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                @endforeach
                            </select>
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
            <form id="formDelete" data-url="{{ route('category.destroy') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="category_id" name="category_id">
                    <p id="nameDelete"></p>
                    <p id="descriptionDelete"></p>
                    <p id="shopDelete"></p>
                    <img src="" id="imageDelete" alt="Imagen Preview" width="100px" height="100px">
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
<script src="{{ asset('js/category/index.js') }}"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('intranet/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/dataTables.select.min.js') }}"></script>  

    <script>
        new DataTable('#dynamic-table');
    </script>
@endsection