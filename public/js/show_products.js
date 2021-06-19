$(document).ready(function () {
    showProducts();
});

function showProducts() {
    $.ajax({
        url: '?controller=Product&action=getAllProductsAsync',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            alert(response);
        }
    });
}