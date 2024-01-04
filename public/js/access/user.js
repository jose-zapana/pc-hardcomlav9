$(document).ready(function () {
    $('.select2').css('width','300px').select2({allowClear:true});

    $formCreate = $('#formCreate');
    $formCreate.on('submit', storeUser);
    $modalCreate = $('#modalCreate');
    $('#newRole').on('click', openModalCreate);

    $formEdit = $('#formEdit');
    $formEdit.on('submit', updateUser);
    $modalEdit = $('#modalEdit');
    $('[data-edit]').on('click', openModalEdit);

    $formDelete = $('#formDelete');
    $formDelete.on('submit', destroyUser);
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

function storeUser() {
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
    var image = $(this).data('image');
    var url_rol = $(this).data('url');

    // Reseteamos el select para que se llene nuevamente
    $('#rolesE').html('');

    // Traer los permisos del role que ya estan guardados para
    // colocarlos en el select
    $.get( url_rol )
        .done(function( data ) {
            $.each( data.rolesAll, function( key, value ) {
                //console.log( value.name );
                if(jQuery.inArray(value.name, data.rolesSelected) !== -1)
                {
                    $("#rolesE").append('<option selected value= '+value.name+'>' + value.description + '</option>');
                }else{
                    $("#rolesE").append('<option value= '+value.name+'>' + value.description + '</option>');
                }

            });

            // Volver a actualizar el select select2
            $('#rolesE').select2();
        });

    $modalEdit.find('[id=user_id]').val(user_id);
    $modalEdit.find('[id=nameE]').val(name);
    $modalEdit.find('[id=dniE]').val(dni);
    $modalEdit.find('[id=emailE]').val(email);

    var path = document.location.origin;
    var completePath = path + '/images/user/' + image;
    $modalEdit.find('[id=image-preview]').attr('src', completePath);

    $modalEdit.modal('show');
}

function updateUser() {
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

    $modalDelete.find('[id=user_id]').val(user_id);
    $modalDelete.find('[id=nameDelete]').html(name);
    $modalDelete.find('[id=emailDelete]').html(email);

    $modalDelete.modal('show');
}

function destroyUser() {
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
            $modalDelete.modal('hide');
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