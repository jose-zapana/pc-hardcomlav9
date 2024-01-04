$(document).ready(function () {
    $('.select2').css('width','300px').select2({allowClear:true});

    $formCreate = $('#formCreate');
    $formCreate.on('submit', storeRole);
    $modalCreate = $('#modalCreate');
    $('#newRole').on('click', openModalCreate);

    $formEdit = $('#formEdit');
    $formEdit.on('submit', updateRole);
    $modalEdit = $('#modalEdit');
    $('[data-edit]').on('click', openModalEdit);

    $formDelete = $('#formDelete');
    $formDelete.on('submit', destroyRole);
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

function storeRole() {
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
    var role_id = $(this).data('edit');
    var name = $(this).data('name');
    var description = $(this).data('description');
    var url_permission = $(this).data('url');

    // Reseteamos el select para que se llene nuevamente
    $('#permissionsE').html('');

    // Traer los permisos del role que ya estan guardados para
    // colocarlos en el select
    $.get( url_permission )
        .done(function( data ) {
            $.each( data.permissionsAll, function( key, value ) {
                //console.log( value.name );
                if(jQuery.inArray(value.name, data.permissionsSelected) !== -1)
                {
                    $("#permissionsE").append('<option selected value= '+value.name+'>' + value.description + '</option>');
                }else{
                    $("#permissionsE").append('<option value= '+value.name+'>' + value.description + '</option>');
                }

            });

            // Volver a actualizar el select select2
            $('#permissionsE').select2();
        });

    $modalEdit.find('[id=role_id]').val(role_id);
    $modalEdit.find('[id=nameE]').val(name);
    $modalEdit.find('[id=descriptionE]').val(description);

    $modalEdit.modal('show');
}

function updateRole() {
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
    var role_id = $(this).data('delete');
    var name = $(this).data('name');
    var description = $(this).data('description');

    $modalDelete.find('[id=role_id]').val(role_id);
    $modalDelete.find('[id=nameDelete]').html(name);
    $modalDelete.find('[id=descriptionDelete]').html(description);

    $modalDelete.modal('show');
}

function destroyRole() {
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