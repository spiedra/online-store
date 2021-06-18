var productName;
var productPrice;
$(document).ready(function () {
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
});

function calculateDiscount(price, dicountPercentage) {
    return price - ((dicountPercentage / 100) * price);
}