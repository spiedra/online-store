$(document).ready(function () {
    getAllFavProducts();
});

function getAllFavProducts() {
    initMainElements();
    $.ajax({
        url: '?controller=Product&action=getAllProductsAsync',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            response.forEach(element => {
                setElementParameters(element);
                console.log(element)
            });
            getProductPromotions();
        }
    });
}

function getProductsSearched() {
    initMainElements();
    $.ajax({
        url: '?controller=Product&action=getProductsBySearch',
        type: 'POST',
        data: {
            productName: $('#productNameSearch').val(),
            categoryType: $('#selectCategories').val(),
        },
        dataType: 'json',
        success: function (response) {
            response.forEach(element => {
                setElementParameters(element);
            });
            createListenerButton();
        }
    });
}

function getProductsBySort(type) {
    initMainElements();
    $.ajax({
        url: '?controller=Product&action=getProductsBySort',
        type: 'POST',
        data: {
            sortType: type,
        },
        dataType: 'json',
        success: function (response) {
            response.forEach(element => {
                setElementParameters(element);
            });
            getProductPromotions();
        }
    });
}

function getProductPromotions() {
    initMainElementsPromo();
    $.ajax({
        url: '?controller=Product&action=getProductsPromotionByDate',
        type: 'get',
        dataType: 'json',
        success: function (response) {
            response.forEach(element => {
                setElementParametersPromo(element);
            });
            $("button").off("click");
            createListenerModals();
            createListenerButton();
        }
    });
}

function createListenerButton() {
    $(".btn-shopping-cart").click(function () {
        productClicked = $(this).attr('id');
    });

    $(".btn-fav").click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url: '?controller=Product&action=insertProductLike',
            type: 'POST',
            data: {
                productId: $(this).attr('id'),
            },
            dataType: 'json',
            success: function (response) {
                $('#' + 'lblLike' + id).html("Likes: " + response[0]['NUMBER_LIKES'])
            }
        });
    });

    $(".btn-buy").click(function () {
        productClicked = $(this).attr('id');
    });

    $("#btn_amount_products").click(function () {
        $.ajax({
            url: '?controller=Customer&action=addProductToCustomer',
            type: 'POST',
            data: {
                productId: productClicked,
                amountProducts: $('#amount_products').val()
            },
            dataType: 'json',
            success: function (response) {
                alert(response);
            }
        });
    });

    $("#btn_direct_purchase").click(function () {
        amountProductsPurchased = $('#amount_products-direct').val();
    });

    $("#btn_showHistoryPurchase").click(function () {
        var tbodyTable = $('.tbody-purchase-history');
        $.ajax({
            url: '?controller=Customer&action=getOrderHeaderCustomer',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                tbodyTable.empty();
                response.forEach(element => {
                    tbodyTable.append($('<tr id="' + element['ID'] + '">')
                        .append($('<td scope="row" class="fw-bold">"').append(element['ID']))
                        .append($('<td>').append(element['TOTAL'] + " $"))
                        .append($('<td>').append(element['MODIFIED_DATE']))
                        .append($('<td>').append($('<button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#productsPurchasedCust" class="btn btn-primary mt-3 showDetailsPurchase">Show detail</button>')))
                    )
                });

                $(".showDetailsPurchase").click(function () {
                    var tbodyTable = $('.tbody-products-purchased');
                    $.ajax({
                        url: '?controller=Customer&action=getPurchasedProducts',
                        type: 'post',
                        data: {
                            orderHeaderId: $(this).closest('tr').attr('id')
                        },
                        dataType: 'json',
                        success: function (response) {
                            tbodyTable.empty();
                            response.forEach(element => {
                                tbodyTable.append($('<tr>')
                                    .append($('<td scope="row" class="fw-bold">"').append(element['NAME']))
                                    .append($('<td>').append(element['PRICE'] + " $"))
                                    .append($('<td>').append(element['TOTAL_DETAIL'] + " $"))
                                    .append($('<td>').append(element['amount_products']))
                                )
                            });
                        }
                    });
                });
            }
        });
    });

    $("#btn_confirm-purchase").click(function () {
        $.ajax({
            url: '?controller=Customer&action=purchaseProducts',
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                alert(response);
            }
        });
    });

    $("#btn_confirm-direct-purchase").click(function () {
        $.ajax({
            url: '?controller=Customer&action=purchaseProduct',
            type: 'POST',
            data: {
                productId: productClicked,
                amountProducts: amountProductsPurchased,
            },
            dataType: 'json',
            success: function (response) {
                alert(response);
            }
        });
    });

    $("#btn_search").click(function () {
        cleaningSettings();
        getProductsSearched();
    });

    $("#btnQuitSearch").click(function () {
        cleaningSettings();
        getAllFavProducts();
    });

    $("#sortSelect").change(function () {
        cleaningSettings();
        getProductsBySort($(this).val());
    });
}

function cleaningSettings() {
    $("button").off("click");
    section.remove();
    sectionPromo.remove();
    createListenerModals();
}