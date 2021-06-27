<?php

class ProductModel {

    protected $database;

    public function __construct() {
        require_once 'libsApi/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function GetAllProductsApi()
    {
        $query = $this->database->prepare("call sp_GET_ALL_PRODUCTS()");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function GetAllProductsToPromoApi()
    {
        $query = $this->database->prepare("call sp_GET_PRODUCTS_TO_PROMO()");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function GetAllProductsPromotionApi()
    {
        $query = $this->database->prepare("call sp_GET_ALL_PRODUCTS_PROMOTION()");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function RegisterProductApi($name, $price, $description, $category, $image) {
        $query = $this->database->prepare("call sp_REGISTER_PRODUCT(:param_NAME, :param_PRICE
        , :param_DESCRIPTION, :param_CATEGORY, :param_IMAGE, @out_RETURN)");
        $query->bindParam(':param_NAME', $name); 
        $query->bindParam(':param_PRICE', $price); 
        $query->bindParam(':param_DESCRIPTION', $description); 
        $query->bindParam(':param_CATEGORY', $category); 
        $query->bindParam(':param_IMAGE', $image); 
        $query->execute();
        $result = $this->database->query("select @out_RETURN")->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result['@out_RETURN'];
    }
}