@extends('layouts.appLanding')

@section('activeShop')
    active
@endsection

@section('styles')
    <style>
        .altura {
            height: 450px;
        }
    </style>
@endsection

@section('title')
    Pc-Hard | Catálago
@endsection

@section('content')
    <div class="container tags">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ion-arrow-down-b"></i> Ordenar por nombre
            </button>
            <ul class="dropdown-menu">
                <li class="active"><a href="#"> <i class="ion-arrow-down-c"></i> Name [A-Z]</a></li>
                <li><a href="#"> <i class="ion-arrow-up-c"></i> Name [Z-A]</a></li>
                <li><a href="#"> <i class="ion-arrow-down-c"></i> Price [Low-High]</a></li>
                <li><a href="#"> <i class="ion-arrow-up-c"></i> Price [High-Low]</a></li>
            </ul>
        </div>

        <p>Buscar por etiquetas</p>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-default btn-xs active">
                <input type="radio" name="options" id="option1" checked> Todos los productos
            </label>
            @foreach( $categories as $category )
            <label class="btn btn-default btn-xs">
                <input type="radio" name="options" id="option2"> {{ $category->name }}
            </label>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Filter -->
            <div class="col-sm-3 filter">
                <div class="item">
                    <div class="title">
                        <a href="#clear" data-action="open" class="down"> <i class="ion-android-arrow-dropdown"></i> Open</a>
                        <a href="#clear" data-action="clear"> <i class="ion-ios-trash-outline"></i> Clear</a>
                        <h1 class="h4">Tipo</h1>
                    </div>
                    <div class="controls">

                    @foreach( $categories as $category )
                    <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="Laptops">{{ $category->name }}</div>
                            <input type="checkbox" name="checkbox" value="">
                    </div>
                    @endforeach
                    </div>

                </div>

                <br>

                 <!-- <div class="item">
                    <div class="title">
                        <a href="#clear" data-action="open" class="down"> <i class="ion-android-arrow-dropdown"></i> Open</a>
                        <a href="#clear" data-action="clear"> <i class="ion-ios-trash-outline"></i> Clear</a>
                        <h1 class="h4">Screen</h1>
                    </div>

                    <div class="controls grid">
                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="7 in">7 in</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="10 in">10 in</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="11 in">11 in</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="14 in">14 in</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="15 in">15 in</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="17 in">17 in</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>
                    </div>
                </div>  -->

                <br>

                <div class="item">
                    <div class="title">
                        <a href="#clear" data-action="open" class="down"> <i class="ion-android-arrow-dropdown"></i> Open</a>
                        <a href="#clear" data-action="clear-price"> <i class="ion-ios-trash-outline"></i> Clear</a>
                        <h1 class="h4">Price</h1>
                    </div>

                    <div class="controls">
                        <br>
                        <div id="slider-price"></div>
                        <br>
                        <p id="amount"></p>
                    </div>
                </div>
                <br>

                <div class="item lite">
                    <div class="title">
                        <a href="#clear" data-action="open" class="down"> <i class="ion-android-arrow-dropdown"></i> Open</a>
                        <a href="#clear" data-action="clear"> <i class="ion-ios-trash-outline"></i> Clear</a>
                        <h1 class="h4">Manufacturer</h1>
                    </div>

                    <div class="controls">
                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="Hp">Hp</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="ASUS">ASUS</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="Acer">Acer</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="Dell">Dell</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="Sony">Sony</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="Apple">Apple</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="Lenovo">Lenovo</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>

                        <div class="checkbox-group" data-status="inactive">
                            <div class="checkbox"><i class="ion-android-done"></i></div>
                            <div class="label" data-value="Microsoft">Microsoft</div>
                            <input type="checkbox" name="checkbox" value="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /// -->

            <!-- Products -->
            <div class="col-sm-9 products">
                <div class="row" id="body-products">
                    <template id="template-product">
                        <div class="col-sm-6 col-md-4 product altura">
                            <a href="#" data-heart class="favorites" data-favorite="inactive"><i class="ion-ios-heart-outline"></i></a>
                            <a href="#" data-detail ><img src="" width="600px" height="500px" data-image alt="HP Chromebook 11"/></a>

                            <div class="content">
                                <h1 class="h4" data-name>HP Chromebook 11</h1>
                                <p class="price" data-price>$199.99</p>
                                <label data-category>Laptops</label>

                                <a href="#" data-detail class="btn btn-link"> Details</a>
                                <button data-product="" data-url="" class="btn btn-primary btn-rounded btn-sm"> <i class="ion-bag"></i> Add to cart</button>
                            </div>
                        </div>
                    </template>

                </div>



                <nav>
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="ion-ios-arrow-left"></i></span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="disabled"><a href="#">..</a></li>
                        <li><a href="#">10</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="ion-ios-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /// -->
        </div>
    </div>
    <br><br>
@endsection

@section('scripts')
    <script src="{{ asset('js/landing/catalog.js') }}"></script>
@endsection
