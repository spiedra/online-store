<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getCase']) && $_GET['getCase'] == 1) {
        require 'libs/configuration.php';
        require 'models/CategoryModel.php';

        $categoryModel = new CategoryModel();
        $response = $categoryModel->getAllCategories();
        http_response_code(200);
        echo json_encode($response, true);
        exit();
    } else if (isset($_GET['getCase']) && $_GET['getCase']  == 2) {
        require 'libs/configuration.php';
        require 'models/ProductModel.php';
        $productModel = new ProductModel();

        $response = $productModel->getAllProducts();
        http_response_code(200);
        echo json_encode($response, true);
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['userNameAdmin'], $_POST['passwordAdmin'], $_POST['passwordConfirmedAdmin'])) {
        require 'libs/configuration.php';
        require 'models/AdminModel.php';

        $adminModel = new AdminModel();
        $response = $adminModel->registerAdmin($_POST['userNameAdmin'], $_POST['passwordAdmin']);

        if ($response == 1) {
            http_response_code(200);
            echo json_encode($response);
        } else {
            http_response_code(406);
            echo json_encode($response);
        }
        exit();
    } else if (isset($_POST['userName'], $_POST['password'])) {
        require 'libs/configuration.php';
        require 'models/SessionModel.php';

        $sessionModel = new SessionModel();
        $response = $sessionModel->validateSession($_POST['userName'], $_POST['password']);
        if ($response == 1) {
            http_response_code(200);
            echo json_encode($response);
        } else if ($response == 2) {
            http_response_code(200);
            echo json_encode($response);
        } else {
            http_response_code(404);
            echo json_encode(-1);
        }
        exit();
    } else if (isset($_POST['nameProduct'], $_POST['priceProduct'], $_POST['descriptionProduct'], $_POST['categorySelected'], $_POST['imageFile'])) {
        require 'libs/configuration.php';
        require 'models/ProductModel.php';
        $productMododel = new ProductModel();
        $response = $productMododel->registerProduct(
            $_POST['nameProduct'],
            $_POST['priceProduct'],
            $_POST['descriptionProduct'],
            $_POST['categorySelected'],
            $_POST['imageFile']
        );
        if ($response == 1) {
            http_response_code(200);
            echo json_encode($response);
        } else {
            http_response_code(406);
            echo json_encode($response);
        }
        exit();
    } else if (isset($_POST['categoryType'])) {
        require 'libs/configuration.php';
        require 'model/CategoryModel.php';

        $categoryModel = new CategoryModel();
        $response = $categoryModel->registerCategory($_POST['categoryType']);
        if ($response == 1) {
            http_response_code(200);
            echo json_encode($response);
        } else {
            http_response_code(406);
            echo json_encode($response);
        }
    } else if ($_POST['productId']) {
        require 'libs/configuration.php';
        require 'models/PromotionModel.php';

        $promotionModel = new PromotionModel();
        $response = $promotionModel->getAllProducts($_POST['productId']);
        http_response_code(200);
        echo json_encode($response);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
} // PUT

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
} // DELETE    
