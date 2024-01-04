$(document).ready(function () {
    $formCreate = $('#formCreate');
    $formCreate.on('submit', sendData)
});

var $formCreate;

function sendData() {
    event.preventDefault();
    // Obtener la URL
    var createUrl = $formCreate.data('url');
    $.ajax({
        url: createUrl,
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
                    text: 'Tienda registrada correctamente.',
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
            }
        }
    });
}