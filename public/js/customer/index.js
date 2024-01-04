$(document).ready(function () {
    $formCreate = $('#formCreate');
    $formCreate.on('submit', storeCustomer);
    $modalCreate = $('#modalCreate');
    $('#newCustomer').on('click', openModalCreate);

    $formEdit = $('#formEdit');
    $formEdit.on('submit', updateCustomer);
    $modalEdit = $('#modalEdit');
    $('[data-edit]').on('click', openModalEdit);

    $formDelete = $('#formDelete');
    $formDelete.on('submit', destroyCustomer);
    $modalDelete = $('#modalDelete');
    $('[data-delete]').on('click', openModalDelete);

});

var $formCreate;
var $modalCreate;

var $formEdit;
var $modalEdit;

var $formDelete;
var $modalDelete;

function openModalCreate() {
    $modalCreate.modal('show');
}

function storeCustomer() {
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
            $modalCreate.modal('hide');
            setTimeout( function () {
                location.reload();
            }, 4000 )
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
function openModalEdit() {
    var user_id = $(this).data('edit');
    var name = $(this).data('name');
    var email = $(this).data('email');
    var dni = $(this).data('dni');
    var phone = $(this).data('phone');
    var customer = $(this).data('customer');
    var url_rol = $(this).data('url');


    $modalEdit.find('[id=user_id]').val(user_id);
    $modalEdit.find('[id=nameE]').val(name);
    $modalEdit.find('[id=dniE]').val(dni);
    $modalEdit.find('[id=emailE]').val(email);
    $modalEdit.find('[id=phoneE]').val(phone);
    $modalEdit.find('[id=customerE]').val(customer);

    $modalEdit.modal('show');
}

function updateCustomer() {
    event.preventDefault();
    // Obtener la URL
    var editUrl = $formEdit.data('url');
    $.ajax({
        url: editUrl,
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
            $modalEdit.modal('hide');
            setTimeout( function () {
                //location.reload();
            }, 4000 )
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

function openModalDelete() {
    var user_id = $(this).data('delete');
    var name = $(this).data('name');
    var email = $(this).data('email');

    var customer_id = $(this).data('customer_id');
    var phoneD = $(this).data('phoneD');

    $modalDelete.find('[id=user_id]').val(user_id);
    $modalDelete.find('[id=nameDelete]').html(name);
    $modalDelete.find('[id=emailDelete]').html(email);

    $modalDelete.find('[id=customer_id]').val(customer_id);
    $modalDelete.find('[id=phoneD]').val(phoneD);


    $modalDelete.modal('show');
}


function destroyCustomer() {
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
            $modalEdit.modal('hide');
            setTimeout( function () {
                location.reload();
            }, 4000 )
        },
        error: function (data) {
            console.log(data.responseJSON.errors.name);
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