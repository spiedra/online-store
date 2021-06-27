var productName;
var productPrice;

$(document).ready(function () {
    createListenerModals();
});

function createListenerModals() {
    $(".btn-modal__create").click(function () {
        productName = $(this).closest('tr').children('td.productName').text();
        productPrice = $(this).closest('tr').children('td.productPrice').text();
        var modalTittle = $('.modal-title');
        modalTittle.empty();
        modalTittle.append('Create promotion to <p class="text-decoration-underline" style="display: inline">' + productName + '</p>');
    });

    $(".btn-modal__history").click(function () {
        var modalTittle = $('.modal_tittle');
        var tbodyTable = $('.tbody-modal');
        productName = $(this).closest('tr').children('td.productName').text();
        modalTittle.empty();
        modalTittle.append('<p class="text-decoration-underline" style="display: inline">' + productName + '</p> promotion history');

        $.ajax({
            url: '?controller=Promotion&action=getPromotionByProduct',
            type: 'post',
            data: {
                productId: $(this).closest('tr').children('td.productId').text()
            },
            dataType: 'json',
            success: function (response) {
                tbodyTable.empty();
                response.forEach(element => {
                    tbodyTable.append($('<tr>')
                        .append($('<td class="productId" scope="row">"').append(element['NAME']))
                        .append($('<td>').append(element['PRICE']))
                        .append($('<td>').append(element['DISCOUNTED_PRICE']))
                        .append($('<td>').append(element['START_DATE']))
                        .append($('<td>').append(element['END_DATE']))
                    )
                });
            }
        });
    });

    $("#btn_create-promotion").click(function () {
        $.ajax({
            url: '?controller=Promotion&action=createPromotion',
            type: 'post',
            data: {
                productName: productName,
                discountedPrice: calculateDiscount(productPrice, $('#discount-percent').val()),
                starDate: $('#modal__start-date').val(),
                endDate: $('#modal__end-date').val()
            },
            dataType: 'json',
            success: function (response) {
                alert(response);
            }
        });
    });

    $("#btn__search").click(function () {
        var selectCategories = $('#selectCategories');

        $.ajax({
            url: '?controller=Category&action=getAllCategoriesAsync',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                selectCategories.empty();
                selectCategories.append('<option <option value="" disabled selected>Choose category</option>');
                response.forEach(element => {
                    selectCategories.append('<option class="select_opcion" value="' +
                        element['TYPE'] + '">' + element['TYPE'] + '</option>');
                });
            }
        });
    });

    $("#btn__shopping-cart").click(function () {
        var tbodyTable = $('.tbody-shopping-cart');
        $.ajax({
            url: '?controller=Customer&action=getProductsByCustomer',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                tbodyTable.empty();
                response.forEach(element => {
                    tbodyTable.append($('<tr id="' + element['ID'] + '">')
                        .append($('<td scope="row" class="fw-bold productId">"').append(element['ID']))
                        .append($('<td>').append(element['NAME']))
                        .append($('<td>').append(element['PRICE']))
                        .append($('<td>').append(element['AMOUNT_PRODUCTS']))
                        .append($('<td>').append($('<img class="img-responsive" alt="image product" width="65" height="65" src="public/assets/' + element['IMAGE_NAME'] + '">')))
                        .append($('<td>').append($('<button class="btn btn-danger mt-3 btn-delete-cart"><i class="fas fa-trash-alt fa-lg"></i></button>')))
                    )
                });

                $(".btn-delete-cart").click(function () {
                    var trid = $(this).closest('tr');
                    $.ajax({
                        url: '?controller=Customer&action=deleteProductCart',
                        type: 'POST',
                        data: {
                            productId: $(this).closest('tr').children('td.productId').text(),
                        },
                        dataType: 'json',
                        success: function (response) {
                            alert(response);
                            trid.remove();
                        }
                    });
                });
            }
        });
    });
}

function calculateDiscount(price, dicountPercentage) {
    return price - ((dicountPercentage / 100) * price);
}