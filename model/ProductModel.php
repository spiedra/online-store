<?php

class ProductModel
{
    public function __construct()
    {
        require_once 'libs/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function registerProduct()
    {
        return ConnectorApi::useHttpPostApi(array(
            'nameProduct' => $_POST['nameProduct'],
            'priceProduct' => $_POST['priceProduct'],
            'descriptionProduct' => $_POST['descriptionProduct'],
            'categorySelected' => $_POST['categorySelected'],
            'imageFile' =>  $_FILES['imageFile']['name']
        ));
    }

    public function getProductsBySearch($productName, $categoryType)
    {
        $query = $this->database->prepare("call sp_SEARCH_PRODUCTS('$productName', '$categoryType')");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function getAllProducts()
    {
        return ConnectorApi::useHttpGetApi("2");
    }

    public function insertProductLike($producId)
    {
        $query = $this->database->prepare("call sp_INSERT_PRODUCT_LIKE('$producId')");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function getAllProductsAsync()
    {
        return ConnectorApi::useHttpGetApi("3");
    }

    public function getProductsAscByPrice()
    {
        $query = $this->database->prepare("call sp_GET_PRODUCTS_BY_PRICE_ASC");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function getProductsDescByPrice()
    {
        $query = $this->database->prepare("call sp_GET_PRODUCTS_BY_PRICE_DESC");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function getProductsPromotionByDate()
    {
        $query = $this->database->prepare("call sp_GET_PRODUCTS_PROMOTIONS_BY_DATE");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function saveImageProduct()
    {
        $folderPath = "public/assets/";
        if (file_exists($folderPath) || @mkdir($folderPath)) {
            if (@move_uploaded_file($_FILES["imageFile"]["tmp_name"], $folderPath . $_FILES["imageFile"]["name"])) {
                return true;
            }
        }
        return false;
    }
}
