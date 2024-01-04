$(document).ready(function () {
    $formCreate = $('#formCreate');
    $formCreate.on('submit', storeAddress);
    $modalCreate = $('#modalCreate');
    $("[data-customer]" ).on('click', openModalCreate);

    $formEdit = $('#formEdit');
    $formEdit.on('submit', updateAddress);
    $modalEdit = $('#modalEdit');
    $('[data-edit]').on('click', openModalEdit);

    $formDelete = $('#formDelete');
    $formDelete.on('submit', destroyCategory);
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
    var customer_id = $(this).data('customer');
    console.log(customer_id);
    $modalCreate.find('[id=customer_id]').val(customer_id);
    $modalCreate.modal('show');
}

function storeAddress() {
    event.preventDefault();
    // Obtener la URL
    var createUrl = $formCreate.data('url');
    console.log("ruta",createUrl)
    $.ajax({
        url: createUrl,
        method: 'post',
        data: new FormData(this),
        processData:false,
        contentType:false,
        success: function (data) {
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
            console.log(data)
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
    var address_id = $(this).data('edit');
    var customer_id = $(this).data('customerid');
    var address = $(this).data('address');
    var country = $(this).data('country');
    var city = $(this).data('city');
    var province = $(this).data('province');

    $modalEdit.find('[id=address_id]').val(address_id);
    $modalEdit.find('[id=customer_id]').val(customer_id);
    $modalEdit.find('[id=addressE]').val(address);
    $modalEdit.find('[id=countryE]').val(country);
    $modalEdit.find('[id=cityE]').val(city);
    $modalEdit.find('[id=provinceE]').val(province);

    $modalEdit.modal('show');
}

function updateAddress() {
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

function openModalDelete() {
    var address_id = $(this).data('delete');
    var address = $(this).data('address');
    var country = $(this).data('country');
    var city = $(this).data('city');
    var province = $(this).data('province');

    $modalDelete.find('[id=address_id]').val(address_id);
    $modalDelete.find('[id=addressDelete]').html(address);
    $modalDelete.find('[id=countryDelete]').html(country);
    $modalDelete.find('[id=cityDelete]').html(city);
    $modalDelete.find('[id=provinceDelete]').html(province);

    $modalDelete.modal('show');
}
function destroyCategory() {
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