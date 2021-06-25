<?php
require 'controllers/OnlineStoreController.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getCase']) && $_GET['getCase'] == 1) {
        OnlineStoreController::GetAllCategories();
    } else if (isset($_GET['getCase']) && $_GET['getCase']  == 2) {
        OnlineStoreController::GetAllProducts();
    }else if (isset($_GET['getCase']) && $_GET['getCase']  == 3) {
        OnlineStoreController::GetAllProducts();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['userNameAdmin'], $_POST['passwordAdmin'], $_POST['passwordConfirmedAdmin'])) {
        OnlineStoreController::RegisterAdmin();
    } else if (isset($_POST['userName'], $_POST['password'])) {
        OnlineStoreController::ValidateSession();
    } else if (isset($_POST['nameProduct'], $_POST['priceProduct'], $_POST['descriptionProduct'], $_POST['categorySelected'], $_POST['imageFile'])) {
        OnlineStoreController::RegisterProduct();
    } else if (isset($_POST['categoryType'])) {
        OnlineStoreController::RegisterCategory();
    } else if (isset($_POST['productId'])) {
        OnlineStoreController::GetHistoryPromotionByProduct();
    } else if (isset($_POST['productName'], $_POST['discountedPrice'], $_POST['starDate'], $_POST['endDate'])) {
        OnlineStoreController::CreatePromotion();
    }elseif (isset($_POST['userNameCustomer'], $_POST['passwordCustomer'], $_POST['firstName'], $_POST['lastName'], $_POST['dateBirth'], $_POST['address'])) {
        OnlineStoreController::RegisterCustomer();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
} // PUT

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
} // DELETE    
