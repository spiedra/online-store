$(document).ready(function () {
    createListenerBtnDeleteAdmin();
});

function createListenerBtnDeleteAdmin() {
    $(".btn-delete--admin").click(function () {
        var trid = $(this).closest('tr');
        $.ajax({
            url: '?controller=Admin&action=deleteAdmin',
            type: 'POST',
            data: {
                adminId: $(this).closest('tr').children('td.adminId').text(),
            },
            dataType: 'text',
            success: function (response) {
                alert(response);
                trid.remove();
            }
        });
    });
}