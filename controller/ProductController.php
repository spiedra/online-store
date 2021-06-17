<?php
class ProductController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        require 'CategoryController.php';
        require_once 'model/ProductModel.php';
        $this->view = new View();
        $this->categoryController = new CategoryController();
        $this->productModel = new ProductModel();
    }

    public function registerProduct()
    {
        if ($this->validateFormatImage($_FILES['imageFile']['type'])) {
            if ($this->productModel->saveImageProduct()) {
                if ($this->productModel->registerProduct() == 1) {
                    echo '<script>alert("Successfully registered)</script>';
                    $this->showProductRegisterView();
                } else {
                    echo '<script>alert("Product is alredy registered")</script>';
                    $this->showProductRegisterView();
                }
            } else {
                echo '<script>alert("Failed to save image")</script>';
            }
        } else {
            echo '<script>alert("Only jpeg and png are accepted")</script>';
        }
    }

    private function validateFormatImage($imageName)
    {
        if ($imageName == "image/jpeg" ||  $imageName == "image/pjpeg" ||  $imageName == "image/png")
            return true;
        return false;
    }

    public function getAllProducts()
    {
        
    }

    public function getAllCategories()
    {
        return $this->categoryController->getAllCategories();
    }

    public function showProductRegisterView()
    {
        $this->view->show("productRegisterView.php", $this->categoryController->getAllCategories());
    }
}
