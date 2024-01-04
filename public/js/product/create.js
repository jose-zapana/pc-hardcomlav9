$(document).ready(function () {
    /*$formCreate = $('#formCreate');
    $formCreate.on('submit', sendData);*/

    $('#btnNew').on('click', renderTemplateItem);

    $(document).on('click', '[data-delete]', deleteItem);

    $('#btnImage').on('click', renderTemplateImage);

    $(document).on('click', '[data-image]', deleteImage);
});

var $formCreate;

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
