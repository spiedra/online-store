<?php
class CategoryController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        $this->view = new View();
    }

    public function getAllCategories()
    {
        return ConnectorApi::useHttpGetApi();
    }
}
