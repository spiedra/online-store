$(document).ready(function () {
    getProductsSold();
    getProductsSoldSearch();
});

function getProductsSold() {
    var tbodyTable = $('.tbody_report_sales');
    $.ajax({
        url: '?controller=Report&action=getAllProductsSold',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            tbodyTable.empty();
            response.forEach(element => {
                tbodyTable.append($('<tr id="' + element['ID'] + '">')
                    .append($('<td scope="row" class="fw-bold">"').append(element['ID']))
                    .append($('<td>').append(element['ID_USER']))
                    .append($('<td>').append(element['TOTAL'] + " $"))
                    .append($('<td>').append(element['MODIFIED_DATE']))
                    .append($('<td>').append($('<button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#productsPurchasedCust" class="btn btn-primary mt-3 showDetailProductsSold">Show detail</button>')))
                )
            });
            getProductsSoldDetails();
        }
    });
}

function getProductsSoldDetails() {
    $(".showDetailProductsSold").click(function () {
        var tbodyTable = $('.tbody-products-sold');
        $.ajax({
            url: '?controller=Report&action=getDetailsProductSold',
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
                        .append($('<td>').append(element['USER_NAME']))
                        .append($('<td>').append(element['PRICE'] + " $"))
                        .append($('<td>').append(element['TOTAL_DETAIL'] + " $"))
                        .append($('<td>').append(element['amount_products']))
                    )
                });
            }
        });
    });
}

function getProductsSoldSearch() {
    $("#btn_search-sales").click(function () {
        var tbodyTable = $('.tbody_report_sales');
        $.ajax({
            url: '?controller=Report&action=getProductsSoldSearch',
            type: 'POST',
            data: {
                startDate: $('#modal__start-date').val(),
                endDate: $('#modal__end-date').val()
            },
            dataType: 'json',
            success: function (response) {
                tbodyTable.empty();
                response.forEach(element => {
                    tbodyTable.append($('<tr id="' + element['ID'] + '">')
                        .append($('<td scope="row" class="fw-bold">"').append(element['ID']))
                        .append($('<td>').append(element['ID_USER']))
                        .append($('<td>').append(element['TOTAL'] + " $"))
                        .append($('<td>').append(element['MODIFIED_DATE']))
                        .append($('<td>').append($('<button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#productsPurchasedCust" class="btn btn-primary mt-3 showDetailProductsSold">Show detail</button>')))
                    )
                });
                getProductsSoldDetails();
            }
        });
    });
}