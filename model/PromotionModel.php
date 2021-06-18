<?php

class PromotionModel
{
    public function __construct()
    {
    }

    public function createPromotion()
    {
        return ConnectorApi::useHttpPostApi(array(
            'productName' => $_POST['productName'],
            'discountedPrice' => $_POST['discountedPrice'],
            'starDate' => date("Y-m-d H:i:s", strtotime($_POST['starDate'])),
            'endDate' => date("Y-m-d H:i:s", strtotime($_POST['endDate']))
        ));
    }

    public function getPromotionByProduct()
    {
        return ConnectorApi::useHttpPostApi(array(
            'productId' => $_POST['productId']
        ));
    }
}
