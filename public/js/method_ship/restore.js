$(document).ready(function () {
    $formRestore = $('#formRestore');
    $formRestore.on('submit', sendData);

    $modalRestore = $('#modalRestore');
    $('[data-restore]').on('click', openModal)
});

var $formRestore;
var $modalRestore;

function openModal() {
    var id = $(this).data('restore');
    var name = $(this).data('name');
    var address = $(this).data('address');
    var phone = $(this).data('phone');

    // Si es input se usa .val()
    $modalRestore.find('[id=id_shop]').val(id);
    // Si es cualquier otra etiqueta se usa .html
    $modalRestore.find('[id=nameRestore]').html(name);
    $modalRestore.find('[id=addressRestore]').html(address);
    $modalRestore.find('[id=phoneRestore]').html(phone);

    $modalRestore.modal('show');
}

function sendData() {
    event.preventDefault();
    // Obtener la URL
    var restoreUrl = $formRestore.data('url');
    $.ajax({
        url: restoreUrl,
        method: 'POST',
        data: new FormData(this),
        processData:false,
        contentType:false,
        success: function (data) {
            console.log(data);
            if (data != "") {
                for ( var property in data )  {
                    $.toast({
                        text:data[property],
                        showHideTransition: 'slide',
                        bgColor: '#D15B47',
                        allowToastClose: false,
                        hideAfter: 4000,
                        stack: 10,
                        textAlign: 'left',
                        position: 'top-right',
                        icon: 'error',
                        heading: 'Error'
                    })
                }
            } else {
                $.toast({
                    text: 'Tienda restaurada correctamente.',
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
                $modalRestore.modal('hide');
                setTimeout( function () {
                    location.reload();
                }, 4000 )
            }
        }
    });
}