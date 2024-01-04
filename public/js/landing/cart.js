$(document).ready(function(){
    //Cart
    //Remove
    $('.checkout-cart').on('click', 'a[href="#remove"]', function(){
        $(this).parents('.media').fadeOut('300');
        var url = $(this).data('url');
        $.get(url, function (resp) {
            console.log(resp);
            if ( resp.success )
            {
                // Actualizar Resumen
                $.toast({
                    text: "Producto eliminado.",
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

                $('#countProducts').html('Subtotal ('+resp.cart.products.length+' items)');
                $('#subtotal').html('S/. '+resp.cart.total);
                $('#total').html('S/. '+resp.cart.total);

            }
        });
    });
    //Remove

    //Count
    $('.checkout-cart').on('click', '.input-group button[data-action="plus"]', function(){
        $(this).parents('.input-group').find('input').val( parseInt($(this).parents('.input-group').find('input').val()) + 1 );
        console.log($(this).data('url'));
        var url = $(this).data('url');
        $.get(url, function (resp) {
            console.log(resp.cart.products.length);
            if ( resp.success )
            {
                // Actualizar Resumen
                $('#countProducts').html('Subtotal ('+resp.cart.products.length+' items)');
                $('#subtotal').html('S/. '+resp.cart.total);
                $('#total').html('S/. '+resp.cart.total);
            }
        });
    });
    $('.checkout-cart').on('click', '.input-group button[data-action="minus"]', function(){
        if( parseInt($(this).parents('.input-group').find('input').val()) > 1 ) {
            $(this).parents('.input-group').find('input').val( parseInt($(this).parents('.input-group').find('input').val()) - 1 );
            console.log($(this).data('url'));
            var url = $(this).data('url');
            $.get(url, function (resp) {
                console.log(resp);
                if ( resp.success )
                {
                    // Actualizar Resumen
                    $('#countProducts').html('Subtotal ('+resp.cart.products.length+' items)');
                    $('#subtotal').html('S/. '+resp.cart.total);
                    $('#total').html('S/. '+resp.cart.total);
                }
            });
        }
    });
    //Count
    //Cart
});
var $products;

function addToCart() {
    var url = $(this).data('url');
    $.get(url, function (resp) {
        console.log(resp);
        if ( resp.success )
        {
            // Redirigir a la ruta
            $.toast({
                text: "Producto agregado. Redireccionando...",
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
                $(location).attr('href', resp.url);
            }, 4000 )

        }
    });

}

function updateSummary() {
    //
}

