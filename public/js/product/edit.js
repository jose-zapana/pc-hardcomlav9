$(document).ready(function () {
    /*$formCreate = $('#formCreate');
    $formCreate.on('submit', sendData);*/
    var idProduct = $('#product_id').val();
    $.get('/dashboard/obtener/infos/'+idProduct, function (resp) {
        //console.log(resp)
        $.each(resp, function (key, info) {
            renderTemplateInfos(info.specification, info.content);
        })
    });

    $.get('/dashboard/obtener/images/'+idProduct, function (resp) {
        $.each(resp, function (key, image) {
            renderTemplateImages(image.product_id, image.id, image.image, image.alt);
        })
    });

    $('#btnNew').on('click', renderTemplateItem);

    $(document).on('click', '[data-delete]', deleteItem);

    $('#btnImage').on('click', renderTemplateImage);

    $(document).on('click', '[data-image]', deleteImage);

    $(document).on('click', '[data-deleteImage]', deleteImageOld);
});

var $formCreate;

function deleteImageOld() {
    // Elimina solo visualmente
    var idImage = $(this).data('deleteimage');
    console.log(idImage);
    $(this).parent().parent().remove();

    // Elimina en la BD
    $.get('/dashboard/delete/images/'+idImage, function (resp) {
        if ( resp.status === 'success' )
        {
            $.toast({
                text: resp.message,
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
        }
        else {
            $.toast({
                text:resp.message,
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

    });
}

function renderTemplateInfos(specification, content) {
    var clone = activateTemplate('#template-item');
    clone.querySelector("[data-specification]").setAttribute('value', specification);
    clone.querySelector("[data-content]").setAttribute('value', content);
    $('#body-items').append(clone);
}

function renderTemplateImages(idProduct, idImage, nameImage, alt) {
    var clone = activateTemplate('#template-image-old');
    var url = document.location.origin;
    var url_image = url + '/images/product/'+nameImage;
    clone.querySelector("[data-imageOld]").setAttribute('src', url_image);
    clone.querySelector("[data-alt]").setAttribute('value', alt);
    clone.querySelector("[data-deleteImage]").setAttribute('data-deleteImage', idImage);
    $('#body-images').append(clone);
}


function deleteImage() {
    //console.log($(this).parent().parent().parent());
    $(this).parent().parent().remove();
}

function renderTemplateImage() {
    var clone = activateTemplate('#template-image');
    $('#body-images').append(clone);
    $('.file-input').ace_file_input({
        no_file:'No imagen',
        btn_choose:'Seleccionar',
        btn_change:'Cambiar',
        droppable:false,
        onchange:null,
        thumbnail:true, //| true | large
        whitelist:'png|jpg|jpeg'
        //blacklist:'exe|php'
        //onchange:''
        //
    });
}

function deleteItem() {
    //console.log($(this).parent().parent().parent());
    $(this).parent().parent().remove();
}

function renderTemplateItem() {
    var clone = activateTemplate('#template-item');
    $('#body-items').append(clone);

}

function activateTemplate(id) {
    var t = document.querySelector(id);
    return document.importNode(t.content, true);
}
