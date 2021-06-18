<?php

class ProductModel
{
    public function __construct()
    {
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

    public function getAllProducts()
    {
        return ConnectorApi::useHttpGetApi("2");
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
