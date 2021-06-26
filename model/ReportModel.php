<?php

class ReportModel
{
    public function __construct()
    {
    }

    public function getProductsSold()
    {
        return ConnectorApi::useHttpGetApi("4");
    }

    public function getProductsSoldSearch()
    {
        return ConnectorApi::useHttpPostApi(array(
            'startDate' => date("Y-m-d H:i:s", strtotime($_POST['startDate'])),
            'endDate' => date("Y-m-d H:i:s", strtotime($_POST['endDate'])) 
        ));
    }

    public function getDetailsProductSold()
    {
        return ConnectorApi::useHttpPostApi(array(
            'orderHeaderId' => $_POST['orderHeaderId'],
        ));
    }
}
