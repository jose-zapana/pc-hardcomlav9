$(document).ready(function () {
    $formRestore = $("#formRestore");
    $formRestore.on("submit", sendData);

    $modalRestore = $("#modalRestore");
    $("[data-restore]").on("click", openModal);
});

var $formRestore;
var $modalRestore;

function openModal() {
    var category_id = $(this).data("restore");
    var name = $(this).data("name");
    var description = $(this).data("description");
    var image = $(this).data("image");
    var shop_name = $(this).data("shop");

    // Si es input se usa .val()
    $modalRestore.find("[id=category_id]").val(category_id);
    // Si es cualquier otra etiqueta se usa .html
    $modalRestore.find("[id=nameRestore]").html(name);
    $modalRestore.find("[id=descriptionRestore]").html(description);

    var path = document.location.origin;
    var completePath = path + "/images/category/" + image;
    $modalRestore.find("[id=imageRestore]").attr("src", completePath);
    $modalRestore.find("[id=shopRestore]").html(shop_name);

    $modalRestore.modal("show");
}

function sendData() {
    event.preventDefault();
    // Obtener la URL
    var restoreUrl = $formRestore.data("url");
    $.ajax({
        url: restoreUrl,
        method: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
            if (data != "") {
                for (var property in data) {
                    $.toast({
                        text: data[property],
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
            } else {
                $.toast({
                    text: "Tienda restaurada correctamente.",
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
                $modalRestore.modal("hide");
                setTimeout(function () {
                    location.reload();
                }, 4000);
            }
        },
    });
}
