$(document).ready(function () {
    // showProducts();
});

function showProducts() {
    $.ajax({
        url: '?controller=Product&action=getAllProductsAsync',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // alert(response);
        }
    });
}

function addChldToPrincipalModal(child) {
    principalModal.appendChild(child);
}

function setAttributeToElement(element, name, value) {
    element.setAttribute(name, value);
}

function addTextNode(text) {
    return document.createTextNode(text);
}

// function modifyModalContainer() {
//     setAttributeToElement(modalContainer, "class", "modal-container");
//     setAttributeToElement(modalContainer, "style", "visibility: visible; opacity: 1;");
//     setAttributeToElement(modalContainer, "id", "modal-container");
// }
