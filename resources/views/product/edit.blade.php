@extends('layouts.appDashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/select2.min.css') }}" />
@endsection

@section('openModProduct')
    open
@endsection

@section('activeLisProduct')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li>
                <i class="ace-icon fa fa-shopping-basket"></i>
                <a href="{{ route('product.index') }}">Productos</a>
            </li>
            <li class="active">{{ $product->name }}</li>
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
    <form class="form-horizontal" id="formEdit" data-url="{{ route('product.update') }}" enctype="multipart/form-data">
        @csrf
        <h4 class="lighter">
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
            Modificación de Productos
        </h4>

        <div class="hr hr-18 hr-double dotted"></div>

        <div class="widget-box">
            <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="widget-title lighter">Información del producto</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div id="fuelux-wizard-container">
                        <div>
                            <ul class="steps">
                                <li data-step="1" class="active">
                                    <span class="step">1</span>
                                    <span class="title">Información General</span>
                                </li>

                                <li data-step="2">
                                    <span class="step">2</span>
                                    <span class="title">Categorías</span>
                                </li>

                                <li data-step="3">
                                    <span class="step">3</span>
                                    <span class="title">Galería de imágenes</span>
                                </li>
                            </ul>
                        </div>

                        <hr />

                        <div class="step-content pos-rel">
                            <div class="step-pane active" data-step="1">
                                <div class="center">
                                    <div class="col-md-6">
                                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-right" for="name"> Nombre del producto </label>

                                            <div class="col-sm-8">
                                                <input type="text" id="name" name="name" placeholder="Ejm: Laptop Lenovo" class="col-xs-10 col-sm-10" value="{{ $product->name }}" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-right" for="description"> Descripción </label>

                                            <div class="col-sm-8">
                                                <input type="text" id="description" name="description" placeholder="Ejm: Laptop ...." class="col-xs-10 col-sm-10" value="{{ $product->description }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-right" for="stock"> Existencias  </label>

                                            <div class="col-sm-8">
                                                <input type="text" id="stock" name="stock" placeholder="Ejm: 100" class="col-xs-10 col-sm-10" value="{{ $product->stock }}" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-right" for="unit_price"> Precio unitario </label>

                                            <div class="col-sm-8">
                                                <input type="text" id="unit_price" name="unit_price" placeholder="Ejm: 100.00" class="col-xs-10 col-sm-10" value="{{ $product->unit_price }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-right" for="shop"> Nombre de Tienda </label>

                                            <div class="col-sm-8">
                                                <select name="shop" id="shop" class="select2" data-placeholder="Seleccione una tienda ...">
                                                    <option value=""> </option>
                                                    @foreach( $shops as $shop )
                                                        @if( $shop->id == $product->shop->id )
                                                            <option value="{{ $shop->id }}" selected>{{ $shop->name }}</option>
                                                        @else
                                                            <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-md-offset-2">
                                        <h4 class="lighter">
                                            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                                            Especificaciones del producto
                                        </h4>
                                        <div class="form-group">
                                            <div class="col-sm-2 col-md-offset-5">
                                                <button type="button" id="btnNew" class="btn btn-success btn-xs"><i class="ace-icon fa fa-plus icon-animated-hand-pointer with"></i>Agregar</button>
                                            </div>
                                        </div>
                                        <div id="body-items"></div>
                                        <template id="template-item">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <div class="col-sm-12">
                                                        <input type="text" data-specification name="infos[]" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="col-sm-12">
                                                        <input type="text" data-content name="specifications[]" class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <button type="button" data-delete class="btn btn-danger btn-xs"><i class="ace-icon fa fa-trash icon-animated-hand-pointer with"></i></button>
                                                </div>
                                            </div>
                                        </template>

                                    </div>
                                </div>
                            </div>

                            <div class="step-pane" data-step="2">
                                <div class="left">
                                    @foreach( $categories as $category )
                                        @if(in_array($category->id,$cats ))
                                        <div class="checkbox">
                                            <label class="block">
                                                <input name="categories[]" value="{{ $category->id }}" type="checkbox" checked class="ace input-lg">
                                                <span class="lbl bigger-120">   {{ $category->name }}</span>
                                            </label>
                                        </div>
                                        @else

                                        <div class="checkbox">
                                            <label class="block">
                                                <input name="categories[]" value="{{ $category->id }}" type="checkbox" class="ace input-lg">
                                                <span class="lbl bigger-120">   {{ $category->name }}</span>
                                            </label>
                                        </div>
                                        @endif

                                    @endforeach
                                </div>
                            </div>

                            <div class="step-pane" data-step="3">
                                <div class="">
                                    <div class="col-md-8 col-md-offset-2">
                                        <h4 class="lighter center">
                                            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                                            Imágenes del producto
                                        </h4>
                                        <div class="form-group">
                                            <div class="col-sm-2 col-md-offset-5">
                                                <button type="button" id="btnImage" class="btn btn-success btn-xs"><i class="ace-icon fa fa-plus icon-animated-hand-pointer with"></i>Agregar</button>
                                            </div>
                                        </div>
                                        <div id="body-images"></div>
                                        <template id="template-image-old">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <div class="col-sm-12 center">
                                                        <img data-imageOld width="50px" height="50px">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="col-sm-12">
                                                        <input type="text" data-alt class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <button type="button" data-deleteImage class="btn btn-danger btn-xs"><i class="ace-icon fa fa-trash icon-animated-hand-pointer with"></i></button>
                                                </div>
                                            </div>
                                        </template>
                                        <template id="template-image">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <div class="col-sm-12">
                                                        <input type="file" data-image-new name="images[]" accept="image/jpeg,image/png,image/jpg" class="file-input" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="col-sm-12">
                                                        <input type="text" data-alt name="alts[]" class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <button type="button" data-image class="btn btn-danger btn-xs"><i class="ace-icon fa fa-trash icon-animated-hand-pointer with"></i></button>
                                                </div>
                                            </div>
                                        </template>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <br><br><br><br><br>
                    <hr />
                    <div class="wizard-actions">
                        <button type="button" class="btn btn-prev">
                            <i class="ace-icon fa fa-arrow-left"></i>
                            Anterior
                        </button>

                        <button type="button" class="btn btn-success btn-next" data-last="Finalizar">
                            Siguiente
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div>

    </form>
@endsection

@section('scripts')
    <script src="{{ asset('intranet/assets/js/wizard.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/jquery-additional-methods.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/bootbox.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function($) {

            $('.select2').css('width','300px').select2({allowClear:true})
                .on('change', function(){
                    $(this).closest('form').validate().element($(this));
                });

            $('#fuelux-wizard-container')
                .ace_wizard({
                    //step: 2 //optional argument. wizard will jump to step "2" at first
                    //buttons: '.wizard-actions:eq(0)'
                })
                //.on('changed.fu.wizard', function() {
                //})
                .on('finished.fu.wizard', function(e) {

                    // Enviar la información con ajax

                    // Obtener la URL
                    var formEdit = $('#formEdit');
                    var editUrl = formEdit.data('url');

                    console.log(editUrl);
                    $.ajax({
                        url: editUrl,
                        method: 'POST',
                        data: new FormData(formEdit[0]),
                        processData:false,
                        contentType:false,
                        success: function (data) {
                            console.log(data);
                            $.toast({
                                text: data.message,
                                showHideTransition: 'slide',
                                bgColor: '#629B58',
                                allowToastClose: false,
                                hideAfter: 4000,
                                stack: 10,
                                textAlign: 'left',
                                position: 'top-right',
                                icon: 'success',
                                heading: 'Éxito'
                            });
                            setTimeout( function () {
                                location.reload();
                            }, 4000 )
                        },
                        error: function (data) {
                            console.log(data);
                            for ( var property in data.responseJSON.errors ) {
                                $.toast({
                                    text:data.responseJSON.errors[property],
                                    showHideTransition: 'slide',
                                    bgColor: '#D15B47',
                                    allowToastClose: false,
                                    hideAfter: 4000,
                                    stack: 10,
                                    textAlign: 'left',
                                    position: 'top-right',
                                    icon: 'error',
                                    heading: 'Error'
                                });
                            }
                        },
                    });
                    /*bootbox.dialog({
                        message: "Thank you! Your information was successfully saved!",
                        buttons: {
                            "success" : {
                                "label" : "OK",
                                "className" : "btn-sm btn-primary"
                            }
                        }
                    });*/
                }).on('stepclick.fu.wizard', function(e){
                //e.preventDefault();//this will prevent clicking and selecting steps
            });

            $(document).one('ajaxloadstart.page', function(e) {
                //in ajax mode, remove remaining elements before leaving page
                $('[class*=select2]').remove();
            });


            $('.file-input').ace_file_input({
                no_file:'No imagen',
                btn_choose:'Seleccionar',
                btn_change:'Cambiar',
                droppable:false,
                onchange:null,
                thumbnail:false, //| true | large
                whitelist:'png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
            });
        })
    </script>
    <script src="{{ asset('js/product/edit.js') }}"></script>
@endsection