$(document).ready(function () {
    $formCreate = $("#formCreate");
    $formCreate.on("submit", storeCategory);
    $modalCreate = $("#modalCreate");
    $("#newCategory").on("click", openModalCreate);

    $formEdit = $("#formEdit");
    $formEdit.on("submit", updateCategory);
    $modalEdit = $("#modalEdit");
    $("[data-edit]").on("click", openModalEdit);

    $formDelete = $("#formDelete");
    $formDelete.on("submit", destroyCategory);
    $modalDelete = $("#modalDelete");
    $("[data-delete]").on("click", openModalDelete);
});

var $formCreate;
var $modalCreate;

var $formEdit;
var $modalEdit;

var $formDelete;
var $modalDelete;

function openModalCreate() {
    $modalCreate.modal("show");
}

function storeCategory() {
    event.preventDefault();
    // Obtener la URL
    var createUrl = $formCreate.data("url");
    $.ajax({
        url: createUrl,
        method: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
            $.toast({
                text: data.message,
                showHideTransition: "slide",
                bgColor: "#629B58",
                allowToastClose: false,
                hideAfter: 4000,
                stack: 10,
                textAlign: "left",
                position: "top-right",
                icon: "success",
                heading: "Éxito",
            });
            $modalCreate.modal("hide");
            setTimeout(function () {
                location.reload();
            }, 4000);
        },
        error: function (data) {
            for (var property in data.responseJSON.errors) {
                $.toast({
                    text: data.responseJSON.errors[property],
                    showHideTransition: "slide",
                    bgColor: "#D15B47",
                    allowToastClose: false,
                    hideAfter: 4000,
                    stack: 10,
                    textAlign: "left",
                    position: "top-right",
                    icon: "error",
                    heading: "Error",
                });
            }
        },
    });
}

function openModalEdit() {
    var category_id = $(this).data("edit");
    var shop_id = $(this).data("shop");
    var name = $(this).data("name");
    var image = $(this).data("image");
    var description = $(this).data("description");

    $modalEdit.find("[id=category_id]").val(category_id);
    $modalEdit.find("[id=nameE]").val(name);
    $modalEdit.find("[id=descriptionE]").val(description);
    var path = document.location.origin;
    var completePath = path + "/images/category/" + image;
    $modalEdit.find("[id=image-preview]").attr("src", completePath);

    $("#shopE option[value=" + shop_id + "]").attr("selected", true);
    console.log(path);
    $modalEdit.modal("show");
}

function updateCategory() {
    event.preventDefault();
    // Obtener la URL
    var editUrl = $formEdit.data("url");
    $.ajax({
        url: editUrl,
        method: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
            $.toast({
                text: data.message,
                showHideTransition: "slide",
                bgColor: "#629B58",
                allowToastClose: false,
                hideAfter: 4000,
                stack: 10,
                textAlign: "left",
                position: "top-right",
                icon: "success",
                heading: "Éxito",
            });
            $modalEdit.modal("hide");
            setTimeout(function () {
                location.reload();
            }, 4000);
        },
        error: function (data) {
            console.log(data.responseJSON.errors.name);
            for (var property in data.responseJSON.errors) {
                $.toast({
                    text: data.responseJSON.errors[property],
                    showHideTransition: "slide",
                    bgColor: "#D15B47",
                    allowToastClose: false,
                    hideAfter: 4000,
                    stack: 10,
                    textAlign: "left",
                    position: "top-right",
                    icon: "error",
                    heading: "Error",
                });
            }
        },
    });
}

function openModalDelete() {
    var category_id = $(this).data("delete");
    var shop_name = $(this).data("shop");
    var name = $(this).data("name");
    var image = $(this).data("image");
    var description = $(this).data("description");

    $modalDelete.find("[id=category_id]").val(category_id);
    $modalDelete.find("[id=nameDelete]").html(name);
    $modalDelete.find("[id=descriptionDelete]").html(description);
    $modalDelete.find("[id=shopDelete]").html(shop_name);

    var path = document.location.origin;
    var completePath = path + "/images/category/" + image;
    $modalDelete.find("[id=imageDelete]").attr("src", completePath);

    $modalDelete.modal("show");
}

function destroyCategory() {
    event.preventDefault();
    // Obtener la URL
    var deleteUrl = $formDelete.data("url");
    $.ajax({
        url: deleteUrl,
        method: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
            $.toast({
                text: data.message,
                showHideTransition: "slide",
                bgColor: "#629B58",
                allowToastClose: false,
                hideAfter: 4000,
                stack: 10,
                textAlign: "left",
                position: "top-right",
                icon: "success",
                heading: "Éxito",
            });
            $modalEdit.modal("hide");
            setTimeout(function () {
                location.reload();
            }, 4000);
        },
        error: function (data) {
            console.log(data.responseJSON.errors.name);
            for (var property in data.responseJSON.errors) {
                $.toast({
                    text: data.responseJSON.errors[property],
                    showHideTransition: "slide",
                    bgColor: "#D15B47",
                    allowToastClose: false,
                    hideAfter: 4000,
                    stack: 10,
                    textAlign: "left",
                    position: "top-right",
                    icon: "error",
                    heading: "Error",
                });
            }
        },
    });
}
