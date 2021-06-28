<?php

class OnlineStoreController
{
    public static function GetAllCategories()
    {
        require 'libsApi/Configuration.php';
        require 'models/CategoryModel.php';

        $categoryModel = new CategoryModel();
        $response = $categoryModel->GetAllCategoriesApi();
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function GetAllProducts()
    {
        require 'libsApi/Configuration.php';
        require 'models/ProductModel.php';
        $productModel = new ProductModel();

        $response = $productModel->GetAllProductsApi();
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function GetAllProductsToPromo()
    {
        require 'libsApi/Configuration.php';
        require 'models/ProductModel.php';
        $productModel = new ProductModel();

        $response = $productModel->GetAllProductsToPromoApi();
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function GetAllProductsPromotion()
    {
        require 'libsApi/Configuration.php';
        require 'models/ProductModel.php';
        $productModel = new ProductModel();

        $response = $productModel->GetAllProductsPromotionApi();
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function RegisterAdmin()
    {
        require 'libsApi/Configuration.php';
        require 'models/AdminModel.php';

        $adminModel = new AdminModel();
        $response = $adminModel->RegisterAdminApi($_POST['userNameAdmin'], $_POST['passwordAdmin']);

        if ($response == 1) {
            http_response_code(200);
            echo json_encode($response);
        } else {
            http_response_code(406);
            echo json_encode($response);
        }
        exit();
    }

    public static function GetOrderHeaderDetails()
    {
        require 'libsApi/Configuration.php';
        require 'models/ReportModel.php';
        $reportModel = new ReportModel();
        $response = $reportModel->GetDetailsProductsSoldApi($_POST['orderHeaderId']);
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function GetAllProductsSold()
    {
        require 'libsApi/Configuration.php';
        require 'models/ReportModel.php';
        $reportModel = new ReportModel();
        $response = $reportModel->GetAllProductsSoldApi();
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function GetOrderHeaderSearch()
    {
        require 'libsApi/Configuration.php';
        require 'models/ReportModel.php';
        $reportModel = new ReportModel();
        $response = $reportModel->GetProductsSoldSearchApi($_POST['startDate'], $_POST['endDate']);
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function GetAllAdmins()
    {
        require 'libsApi/Configuration.php';
        require 'models/AdminModel.php';

        $adminModel = new AdminModel();
        $response = $adminModel->getAllAdminsApi();

        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function RegisterCustomer()
    {
        require 'libsApi/Configuration.php';
        require 'models/CustomerModel.php';

        $customerModel = new CustomerModel();
        $response = $customerModel->RegisterCustomerApi(
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
        require 'libsApi/Configuration.php';
        require 'models/SessionModel.php';

        $sessionModel = new SessionModel();
        $response = $sessionModel->ValidateSessionApi($_POST['userName'], $_POST['password']);
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
        require 'libsApi/Configuration.php';
        require 'models/ProductModel.php';
        $productMododel = new ProductModel();
        $response = $productMododel->RegisterProductApi(
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
        require 'libsApi/Configuration.php';
        require 'models/CategoryModel.php';

        $categoryModel = new CategoryModel();
        $response = $categoryModel->RegisterCategoryApi($_POST['categoryType']);
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
        require 'libsApi/Configuration.php';
        require 'models/PromotionModel.php';

        $promotionModel = new PromotionModel();
        $response = $promotionModel->GetHistoryPromotionByProductApi($_POST['productId']);
        http_response_code(200);
        echo json_encode($response);
        exit();
    }

    public static function CreatePromotion()
    {
        require 'libsApi/Configuration.php';
        require 'models/PromotionModel.php';

        $promotionModel = new PromotionModel();
        $response = $promotionModel->CreatePromotionApi(
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

    public static function DeleteAdmin()
    {
        require 'libsApi/Configuration.php';
        require 'models/AdminModel.php';

        $adminModel = new AdminModel();
        $adminModel->DeleteAdminApi($_POST['adminId']);

        http_response_code(200);
        echo json_encode("
        Admin successfully removed
        ");
        exit();
    }
}
