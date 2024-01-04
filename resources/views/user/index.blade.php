@extends('layouts.appDashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/select2.min.css') }}" />
@endsection

@section('openModAccess')
    open
@endsection

@section('activeListRole')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Mantenedor de Usuarios</li>
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
    <a id="newRole" class="btn btn-success">
        <i class="icon-2x fa fa-plus"></i> Nuevo Usuario
    </a>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">DNI</th>
            <th scope="col">Email</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $users as $user )
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->dni }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if($user->image)
                    <img src="{{ asset('images/user/'.$user->image) }}" alt="{{ $user->name }}" width="100px" height="100px">
                @else
                    <img src="{{ asset('images/user/no_image.jpg') }}" alt="No image" width="100px" height="100px">
                @endif
            </td>
            <td>

                <a data-edit="{{ $user->id }}" data-dni="{{ $user->dni }}" data-image="{{ $user->image }}" data-url="{{ route('user.roles', $user->id) }}" data-email="{{ $user->email }}" data-name="{{ $user->name }}"  class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>

                <a data-delete="{{ $user->id }}" data-dni="{{ $user->dni }}" data-email="{{ $user->email }}" data-name="{{ $user->name }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>

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
                    <h4 class="modal-title">Nuevo Usuario</h4>
                </div>
                <form id="formCreate" class="form-horizontal" data-url="{{ route('user.store') }}" enctype="multipart/form-data">
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
                            <label class="col-sm-3 control-label no-padding-right" for="image"> Imagen </label>

                            <div class="col-sm-9">
                                <input type="file" id="image" name="image" class="col-xs-10 col-sm-10" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="roles"> Roles </label>

                            <div class="col-sm-9">
                                <select multiple="" name="roles[]" class="select2 col-xs-10 col-sm-10" id="roles" >
                                    @foreach( $roles as $role )
                                    <option value="{{$role->name}}">{{ $role->description }}</option>
                                    @endforeach
                                </select>

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
                <form id="formEdit" class="form-horizontal" data-url="{{ route('user.update') }}" enctype="multipart/form-data">
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
                            <label class="col-sm-3 control-label no-padding-right" for="imageE"> Imagen </label>

                            <div class="col-sm-9">
                                <input type="file" id="imageE" name="image" class="col-xs-10 col-sm-10" />
                                <img src="" id="image-preview" width="100px" height="100px" alt="Imagen previsualizacion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="rolesE"> Roles </label>

                            <div class="col-sm-9">
                                <select multiple="" name="roles[]" class="select2 col-xs-10 col-sm-10" id="rolesE" >

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
                <form id="formDelete" data-url="{{ route('user.destroy') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="user_id" name="user_id">
                        <p id="nameDelete"></p>
                        <p id="emailDelete"></p>
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
    <script src="{{ asset('js/access/user.js') }}"></script>
@endsection