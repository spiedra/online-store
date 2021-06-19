<?php

class OnlineStoreController
{
    public static function GetAllCategories()
    {
        require 'libs/configuration.php';
        require 'models/CategoryModel.php';

        $categoryModel = new CategoryModel();
        $response = $categoryModel->getAllCategories();
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function GetAllProducts()
    {
        require 'libs/configuration.php';
        require 'models/ProductModel.php';
        $productModel = new ProductModel();

        $response = $productModel->getAllProducts();
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function RegisterAdmin()
    {
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
    }

    public static function RegisterCustomer()
    {
        require 'libs/configuration.php';
        require 'models/CustomerModel.php';

        $customerModel = new CustomerModel();
        $response = $customerModel->registerCustomer(
            $_POST['userNameCustomer'],
            $_POST['passwordCustomer'],
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['dateBirth'],
            $_POST['address']
        );

        if ($response == 1) {
            http_response_code(200);
            echo json_encode(
                "Successful registration"
            );
        } else {
            http_response_code(406);
            echo json_encode(
                "Username is already in use"
            );
        }
        exit();
    }

    public static function ValidateSession()
    {
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
    }

    public static function RegisterProduct()
    {
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
    }

    public static function RegisterCategory()
    {
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
        exit();
    }

    public static function GetHistoryPromotionByProduct()
    {
        require 'libs/configuration.php';
        require 'models/PromotionModel.php';

        $promotionModel = new PromotionModel();
        $response = $promotionModel->getHistoryPromotionByProduct($_POST['productId']);
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function CreatePromotion()
    {
        require 'libs/configuration.php';
        require 'models/PromotionModel.php';

        $promotionModel = new PromotionModel();
        $response = $promotionModel->createPromotion(
            $_POST['productName'],
            $_POST['discountedPrice'],
            $_POST['starDate'],
            $_POST['endDate']
        );

        if ($response == 0) {
            http_response_code(406);
            echo json_encode(
                "Promotion alredy exists"
            );
        } else {
            http_response_code(200);
            echo json_encode(
                "Promotion successfully created"
            );
        }
        exit();
    }
}
