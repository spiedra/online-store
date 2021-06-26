<?php

class PromotionModel
{

    protected $database;

    public function __construct()
    {
        require_once 'libsApi/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function CreatePromotionApi($productName, $discountPrice, $startDate, $endDate)
    {
        $query = $this->database->prepare("call sp_INSERT_PRODUCT_PROMOTION(:param_NAME_PRODUCT
        , :param_DISCOUNTED_PRICE
        , :param_START_DATE
        , :param_END_DATE
        , @out_RETURN)");
        $query->bindParam(':param_NAME_PRODUCT', $productName);
        $query->bindParam(':param_DISCOUNTED_PRICE', $discountPrice);
        $query->bindParam(':param_START_DATE', $startDate);
        $query->bindParam(':param_END_DATE', $endDate);
        $query->execute();
        $result = $this->database->query("select @out_RETURN")->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result['@out_RETURN'];
    }

    public function GetHistoryPromotionByProductApi($param_PRODUCT_ID)
    {
        $query = $this->database->prepare("call sp_GET_HISTORY_PROMOTIONS('$param_PRODUCT_ID')");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }
}
