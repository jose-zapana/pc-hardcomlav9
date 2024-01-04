@extends('layouts.appDashboard')

@section('styles')
@endsection

@section('activeModExport')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Exportaciones en PDF y EXCEL</li>
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
    <div class="widget-box">
        <div class="widget-header widget-header-flat widget-header-small">
            <h5 class="widget-title">
                <i class="ace-icon fa fa-file-pdf-o"></i>
                Exportaciones en PDF
            </h5>
        </div>

        <div class="widget-body">
            <div class="widget-main">
                <div class="infobox infobox-green infobox-small infobox-dark">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-download"></i>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">Stream</div>
                        <div class="infobox-content">
                            <a class="btn btn-xs btn-white" target="_blank" href="{{ route('pdf.basic') }}">Descargar</a>
                        </div>
                    </div>
                </div>
                <div class="infobox infobox-blue infobox-small infobox-dark">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-download"></i>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">Download</div>
                        <div class="infobox-content">
                            <a class="btn btn-xs btn-white" href="{{ route('pdf.basic.download') }}">Descargar</a>
                        </div>
                    </div>
                </div>
                <div class="infobox infobox-brown infobox-small infobox-dark">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-download"></i>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">Save/Down</div>
                        <div class="infobox-content">
                            <a class="btn btn-xs btn-white" target="_blank" href="{{ route('pdf.save.download') }}">Descargar</a>
                        </div>
                    </div>
                </div>
                <div class="infobox infobox-orange infobox-small infobox-dark">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-download"></i>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">ViewStream</div>
                        <div class="infobox-content">
                            <a class="btn btn-xs btn-white" target="_blank" href="{{ route('pdf.view.stream') }}">Descargar</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.widget-main -->
        </div><!-- /.widget-body -->

    </div>
    <div class="widget-box widget-color-green">
        <div class="widget-header widget-color-green widget-header-flat widget-header-small">
            <h5 class="widget-title">
                <i class="ace-icon fa fa-file-excel-o"></i>
                Exportaciones en EXCEL
            </h5>
        </div>

        <div class="widget-body">
            <div class="widget-main">
                <div class="infobox infobox-green infobox-small infobox-dark">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-download"></i>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">QuickStart</div>
                        <div class="infobox-content">
                            <a class="btn btn-xs btn-white" href="{{ route('excel.basic') }}">Descargar</a>
                        </div>
                    </div>
                </div>
                <div class="infobox infobox-blue infobox-small infobox-dark">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-download"></i>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">Collection</div>
                        <div class="infobox-content">
                            <a class="btn btn-xs btn-white" href="{{ route('excel.collection') }}">Descargar</a>
                        </div>
                    </div>
                </div>
                <div class="infobox infobox-brown infobox-small infobox-dark">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-download"></i>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">Array</div>
                        <div class="infobox-content">
                            <a class="btn btn-xs btn-white" href="{{ route('excel.array') }}">Descargar</a>
                        </div>
                    </div>
                </div>
                <div class="infobox infobox-orange infobox-small infobox-dark">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-download"></i>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">Constructor</div>
                        <div class="infobox-content">
                            <a class="btn btn-xs btn-white" href="{{ route('excel.construct') }}">Descargar</a>
                        </div>
                    </div>
                </div>

                <div class="infobox infobox-orange infobox-small infobox-dark">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-download"></i>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">View</div>
                        <div class="infobox-content">
                            <a class="btn btn-xs btn-white" href="{{ route('excel.view') }}">Descargar</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.widget-main -->
        </div><!-- /.widget-body -->

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/access/') }}"></script>
@endsection