@livewireScripts
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('intranet/assets/js/jquery-2.1.4.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="{{ asset('intranet/assets/js/jquery-1.11.3.min.js')}}"></script>
<![endif]-->

<script src="{{ asset('intranet/assets/js/bootstrap.min.js')}}"></script>

<!-- page specific plugin scripts -->


<!-- ace scripts -->
<script src="{{ asset('intranet/assets/js/ace-elements.min.js')}}"></script>
<script src="{{ asset('intranet/assets/js/ace.min.js')}}"></script>
<script src="{{ asset('toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<!-- inline scripts related to this page -->

<script>
    Echo.private('order-placed')
        .listen('OrderPlaced', (e) => {
            var mensaje = 'El cliente ' + e.customer + ' ha realizado un pedido por S/.' + e.total;
            $.toast({
                text: mensaje,
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
        });
</script>

<script>
    function noty(msg, option = 1) {
        Snackbar.show({
            text: msg.toUpperCase(),
            actionText: 'CERRAR',
            actionTextColor: '#fff',
            backgroundColor: option == 1 ? '#3b3f5c' : '#e7515a',
            pos: 'top-right',
        });
    }
</script>



@yield('scripts')