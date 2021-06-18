<?php

class CategoryModel
{
    public function __construct()
    {
    }

    public function registerCategory()
    {
        return ConnectorApi::useHttpPostApi(array(
            'categoryType' => $_POST['categoryType']
        ));
    }

    public function getAllCategories()
    {
        return ConnectorApi::useHttpGetApi("1");
    }
}
