<?php

class PromotionModel
{

    protected $database;

    public function __construct()
    {
        require_once 'libs/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function getAllProducts($param_PRODUCT_ID)
    {
        $query = $this->database->prepare("call sp_GET_HISTORY_PROMOTIONS('$param_PRODUCT_ID')");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }
}
