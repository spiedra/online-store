<?php
class ProductController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        $this->view = new View();
    }

    public function registerProduct()
    {
    }

    public function showProductRegisterView()
    {
        $this->view->show("productRegisterView.php", null);
    }
}
