$(document).ready(function () {
    $formDelete = $('#formDelete');
    $formDelete.on('submit', sendData);

    $modalDelete = $('#modalDelete');
    $('[data-delete]').on('click', openModal)
    //$(document).on('click', '[data-delete]', openModal);

});

var $formDelete;
var $modalDelete;

/*function redirectEdit() {
    var id = $(this).data('edit');
    var url = '/dashboard/tienda/actualizar/'+id;
    $(location).attr('href', url)
}*/

function openModal() {
    var id = $(this).data('delete');
    var name = $(this).data('name');
    var description = $(this).data('description');

    //console.log($(this).data('name'));

    // Si es input se usa .val()
    $modalDelete.find('[id=product_id]').val(id);
    // Si es cualquier otra etiqueta se usa .html
    $modalDelete.find('[id=nameDelete]').html(name);
    $modalDelete.find('[id=descriptionDelete]').html(description);

    $modalDelete.modal('show');
}

function sendData() {
    event.preventDefault();
    // Obtener la URL
    var deleteUrl = $formDelete.data('url');
    $.ajax({
        url: deleteUrl,
        method: 'POST',
        data: new FormData(this),
        processData:false,
        contentType:false,
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
            setTimeout( function () {
                location.reload();
            }, 4000 )
        },
        error: function (data) {
            console.log(data);
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