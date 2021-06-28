var optionDefaultCategory = document.createElement('option');
var optionCategory = document.createElement('option');
var idProduct;

$(document).ready(function () {
    createListenersManageProduct();
});

function createListenersManageProduct() {
    $(".btn-delete--product").click(function () {
        var trid = $(this).closest('tr');
        $.ajax({
            url: '?controller=Product&action=deleteProduct',
            type: 'POST',
            data: {
                productId: $(this).closest('tr').children('td.productId').text()
            },
            dataType: 'json',
            success: function (response) {
                alert(response);
                trid.remove();
            }
        });
    });

    $(".btn-update--product").click(function () {
        idProduct = $(this).closest('tr').children('td.productId').text();
        var selectCategories = $('#inputCategories');
        var containerCurrentImage = $('#containerCurrentImage');
        productName = $(this).closest('tr').children('td.productName').text();
        productPrice = $(this).closest('tr').children('td.productPrice').text();
        productCategory = $(this).closest('tr').children('td.productType').text();
        productDescription = $(this).closest('tr').children('td.productDescription').text();
        productImageName = $(this).closest('tr').children('td.productImage').attr('id');
        $('#producIdMange').val(idProduct);
        $('#inputNameProduct').val(productName);
        $('#inputPriceProduct').val(productPrice);
        $('#inputDescriptionProduct').val(productDescription);
        $('#inputCategories').val();
        containerCurrentImage.empty();
        containerCurrentImage.append('<label class="mb-1" for="inputImageFile">Current image</label>');
        containerCurrentImage.append('<img class="img-responsive mt-1" src="public/assets/' + productImageName + '" alt="image product" width="70" height="70" />');

        $.ajax({
            url: '?controller=Category&action=getAllCategoriesAsync',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                selectCategories.empty();
                selectCategories.append('<option value="' + productCategory + '" disabled>' + productCategory + '</option>');
                response.forEach(element => {
                    selectCategories.append('<option class="select_opcion" value="' +
                        element['TYPE'] + '">' + element['TYPE'] + '</option>');
                });
            }
        });
    });
}