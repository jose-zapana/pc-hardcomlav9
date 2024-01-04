$(document).ready(function () {
    $formCheckout = $('#formCheckout');
    $formCheckout.on('submit', confirmOrder);
    //$('[data-delete]').on('click', openModalDeleteShip);

});

var $formCheckout;
var $address;
var $shipping;
var $payment;

function confirmOrder() {
    event.preventDefault();

    // Obtener la URL
    var confirmURL = $formCheckout.data('url');

    // Obtener la información
    var optionSelected = $('[data-style=selected]');

    $.each( optionSelected, function( key, value ) {
        //console.log($(this).attr('data-option'));
        if ($(this).attr('data-option') === 'address')
            $address = $(this).attr('data-value');
        if ($(this).attr('data-option') === 'shipping')
            $shipping = $(this).attr('data-value');
        if ($(this).attr('data-option') === 'payment')
            $payment = $(this).attr('data-value');
    });

    console.log($address +' '+ $shipping + ' ' + $payment);

    $.ajax({
        url: confirmURL,
        method: 'POST',
        data: {address:$address, shipping:$shipping, payment:$payment},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
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

        },
        error: function (data) {
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
}
