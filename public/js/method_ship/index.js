$(document).ready(function () {
    $formCreateShip = $('#formCreateShip');
    $formCreateShip.on('submit', storeMethodShip);
    $modalCreateShip = $('#modalCreateShip');
    $('#newMethodShip').on('click', openModalCreateShip);

    $formEditShip = $('#formEditShip');
    $formEditShip.on('submit', updateMethodShip);
    $modalEditShip = $('#modalEditShip');
    $('[data-edit]').on('click', openModalEditShip);

    $formDeleteShip = $('#formDeleteShip');
    $formDeleteShip.on('submit', destroyMethodShip);
    $modalDeleteShip = $('#modalDeleteShip');
    $('[data-delete]').on('click', openModalDeleteShip);

});

var $formCreateShip;
var $modalCreateShip;

var $formEditShip;
var $modalEditShip;

var $formDeleteShip;
var $modalDeleteShip;

function openModalCreateShip() {
    $modalCreateShip.modal('show');
}

function storeMethodShip() {
    event.preventDefault();
    // Obtener la URL
    var createUrl = $formCreateShip.data('url');
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
            $modalCreateShip.modal('hide');
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

function openModalEditShip() {
    var ship_id = $(this).data('edit');
    var shop_id = $(this).data('shop');
    var name = $(this).data('name');
    var image = $(this).data('image');

    $modalEditShip.find('[id=ship_id]').val(ship_id);
    $modalEditShip.find('[id=name_edit]').val(name);
    var path = document.location.origin;
    var completePath = path + '/images/method_ship/' + image;
    $modalEditShip.find('[id=image-preview]').attr('src', completePath);

    $('#shop_edit option[value='+shop_id+']').attr('selected', true);
    console.log(path);
    $modalEditShip.modal('show');
}

function updateMethodShip() {
    event.preventDefault();
    // Obtener la URL
    var editUrl = $formEditShip.data('url');
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
            $modalEditShip.modal('hide');
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

function openModalDeleteShip() {
    var ship_id = $(this).data('delete');
    var shop_name = $(this).data('shop');
    var name = $(this).data('name');
    var image = $(this).data('image');

    $modalDeleteShip.find('[id=ship_id]').val(ship_id);
    $modalDeleteShip.find('[id=nameDelete]').html(name);
    $modalDeleteShip.find('[id=shopDelete]').html(shop_name);

    var path = document.location.origin;
    var completePath = path + '/images/method_ship/' + image;
    $modalDeleteShip.find('[id=imageDelete]').attr('src', completePath);

    $modalDeleteShip.modal('show');
}

function destroyMethodShip() {
    event.preventDefault();
    // Obtener la URL
    var deleteUrl = $formDeleteShip.data('url');
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
            $modalDeleteShip.modal('hide');
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