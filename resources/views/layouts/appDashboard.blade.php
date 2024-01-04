<!-- appDashboard -->
<!DOCTYPE html>
<html lang="es">

@include('layouts.theme.head')

<body class="no-skin">

    @include('layouts.theme.navbar')

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        @include('layouts.theme.sidebar')

        <div class="main-content">
            <div class="main-content-inner">
                @yield('breadcrumbs')

                <div class="page-content">
                    <div class="row">
                        <div id="app" class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            @yield('content')
                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->
        @include('layouts.theme.footer')

    </div><!-- /.main-container -->

    @include('layouts.theme.scripts')

</body>

</html>