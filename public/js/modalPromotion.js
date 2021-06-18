$(document).ready(function () {
    $(".btn-modal__create").click(function () {
        var modalTittle = $('.modal-title');
        modalTittle.empty();
        modalTittle.append('Create promotion to <p class="text-decoration-underline" style="display: inline">' + $(this).closest('tr').children('td.productName').text()+'</p>');
    });

    $(".btn-modal__history").click(function () {
        var modalTittle = $('.modal_tittle'); 
        var productName = $(this).closest('tr').children('td.productName').text();
        var tbodyTable = $('.tbody-modal');
        modalTittle.empty();
        modalTittle.append('<p class="text-decoration-underline" style="display: inline">'+ productName + '</p> promotion history');

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
});