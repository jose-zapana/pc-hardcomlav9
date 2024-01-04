$(document).ready(function () {

    $(document).on('click', '[data-product]', addToCart);
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

