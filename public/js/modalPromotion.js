$(document).ready(function () {
    $(".btn-modal__create").click(function () {

        // var modalTittle = $('.modal_tittle');
        // var productName = $(this).closest('tr').children('td.two').text();
        // modalTittle.empty();
        // // modalTittle.append("Create promotion to " + productName);
        // // var x = $(this).text();
        // // alert(x);

        // // var tr = $(this).parentNode.parentNode; // the parent of btn is the td, the parent of td is the tr.
        // // var td = tr.getElementsByTagName("td")[0]; // get the first TD in the TR
        // alert($(this).closest('tr').children('td.two').text()); // log the content of the TD
        $.ajax({
            url: '?controller=Promotion&action=getPromotionByProduct',
            type: 'post',
            data: {
                productId: inputMovieName
            },
            dataType: 'json',
            success: function (response) {
                
            }
        });
    });

    $(".btn-modal__history").click(function () {
        var modalTittle = $('.modal_tittle');
        var productName = $(this).closest('tr').children('td.two').text();
        modalTittle.empty();
        modalTittle.append("History to " + productName);
    });
});