$(document).ready(function () {
    $.get("/landing/get/products/", function (resp) {
        console.log(resp);
        $products = resp;
        $.each(resp, function (key, product) {
            renderTemplateProducts(
                product.id,
                product.name,
                product.unit_price,
                product.images[0].image,
                product.categories[0]
            );
        });
    });

    $(document).on("click", "[data-product]", addToCart);
});

var $products;

function addToCart() {
    var url = $(this).data("url");
    $.get(url, function (resp) {
        console.log(resp);
        if (resp.success) {
            // Redirigir a la ruta
            $.toast({
                text: "Producto agregado. Redireccionando...",
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
            setTimeout(function () {
                $(location).attr("href", resp.url);
            }, 4000);
        }
    });
}

function renderTemplateProducts(
    idProduct,
    nameProduct,
    priceProduct,
    imageProduct,
    categoryProduct
) {
    var clone = activateTemplate("#template-product");

    var url = document.location.origin;
    var url_image = url + "/images/product/" + imageProduct;
    clone.querySelector("[data-heart]").setAttribute("data-heart", idProduct);
    clone
        .querySelector("[data-detail]")
        .setAttribute("href", url + "/product/detail/" + idProduct);
    clone
        .querySelector("[data-product]")
        .setAttribute("data-product", idProduct);
    clone
        .querySelector("[data-url]")
        .setAttribute("data-url", url + "/add/cart/" + idProduct);
    clone.querySelector("[data-image]").setAttribute("src", url_image);
    clone.querySelector("[data-name]").innerHTML = nameProduct;
    clone.querySelector("[data-price]").setAttribute("S/. " + priceProduct);
    clone.querySelector("[data-category]").innerHTML = categoryProduct;

    $("#body-products").append(clone);
}

function activateTemplate(id) {
    var t = document.querySelector(id);
    return document.importNode(t.content, true);
}
