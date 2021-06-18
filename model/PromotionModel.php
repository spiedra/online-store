<?php

class PromotionModel
{
    public function __construct()
    {
    }

    public function getPromotionByProduct()
    {
        return ConnectorApi::useHttpPostApi(array(
            'productId' => $_POST['productId']
        ));
    }
}
