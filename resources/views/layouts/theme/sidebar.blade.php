<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>

    <ul class="nav nav-list">
        <li class="">
            <a href="{{ route('dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> PANEL </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- Administrador --}}
        @can('create_store')
        <li class=" @yield('openModShop') ">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-archive"></i>
                <span class="menu-text">
                    TIENDAS
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class=" @yield('activeListShop') ">
                    <a href="{{ route('shop.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Listar Tiendas
                    </a>

                    <b class="arrow"></b>

                </li>

                <li class=" @yield('activeCreateShop') ">
                    <a href="{{ route('shop.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Crear Tienda
                    </a>

                    <b class="arrow"></b>
                </li>
                @can('restore_store')
                <li class=" @yield('activeRestoreShop') ">
                    <a href="{{ route('shop.trashed') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Restaurar Tiendas
                    </a>

                    <b class="arrow"></b>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        <li class=" @yield('openModCategory') ">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-cart-plus"></i>
                <span class="menu-text">
                    CATEGORÍAS
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class=" @yield('activeListCategory') ">
                    <a href="{{ route('category.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Listar categorías
                    </a>

                    <b class="arrow"></b>

                </li>

                <li class=" @yield('activeRestoreCategory') ">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Restaurar Categorías
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        @can('view_payments')
        <li class=" @yield('openModCategory') ">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-credit-card"></i>
                <span class="menu-text">
                    PAGOS
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class=" @yield('activeListCategory') ">
                    <a href="{{ route('payment.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Listar Pagos
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
        </li>
        <li class="">

            <a href="#" class="dropdown-toggle" data-active="false">
                <i class="menu-icon fa fa-bar-chart-o"></i>
                <span class="menu-text">
                    VENTAS
                </span>

            </a>

        </li>
        @endcan
        @can('view_shipping')
        <li class=" @yield('openModMethodShip') ">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-truck"></i>
                <span class="menu-text">
                    ENVIOS
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class=" @yield('activeListMethodShip') ">
                    <a href="{{ route('method_ship.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Listar Envios
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class=" @yield('activeRestoreMethodShip') ">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Restaurar Envios
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        @endcan
        @can('create_store')
        <li class=" @yield('openModProduct') ">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-barcode"></i>
                <span class="menu-text">
                    PRODUCTOS
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class=" @yield('activeListProduct') ">
                    <a href="{{ route('product.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Listar Productos
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class=" @yield('activeCreateProduct') ">
                    <a href="{{ route('product.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Crear Producto
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        <!--Mantenedor Direcciones-->

        <li class=" @yield('openModAddress') ">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-map-marker"></i>
                <span class="menu-text">
                    DIRECCIONES
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class=" @yield('activeListAddress') ">
                    <a href="{{ route('address.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Listar clientes
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        @can('access_permission')
        <li class=" @yield('openModAccess') ">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-key"></i>
                <span class="menu-text">
                    ACCESO
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class=" @yield('activeListPermission') ">
                    <a href="{{ route('permission.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Permisos
                    </a>

                    <b class="arrow"></b>

                </li>
                <li class=" @yield('activeListRoles') ">
                    <a href="{{ route('role.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Roles
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class=" @yield('activeListUsers') ">
                    <a href="{{ route('user.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Usuarios
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        @endcan

        <!--Fin Mantenedor Direciones-->

        @can('create_store')
        <li class=" @yield('openModCustomer') ">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text">
                    CLIENTES
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class=" @yield('activeListCustomers') ">
                    <a href="{{ route('customer.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Clientes
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>

        </li>
        <li class="">

            <a href="#" class="dropdown-toggle" data-active="false">
                <i class="menu-icon fa glyphicon-euro"></i>
                <span class="menu-text">
                    MONEDAS
                </span>

            </a>

        </li>

        <li class="">

            <a href="#" class="dropdown-toggle" data-active="false">
                <i class="menu-icon glyphicon glyphicon-inbox"></i>
                <span class="menu-text">
                    CIERRE CAJA
                </span>

            </a>

        </li>
        @endcan


        <li class=" @yield('activeModExport') ">
            <a href="{{ route('exports') }}">
                <i class="menu-icon fa fa-file-pdf-o"></i>
                <span class="menu-text">
                    PDF y Excel
                </span>
            </a>
        </li>

        <li class=" @yield('activeMod') ">
            <a href="{{ route('middleware.check') }}">
                <i class="menu-icon fa fa-key"></i>
                <span class="menu-text">
                    Middleware Check
                </span>
            </a>
        </li>


    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>