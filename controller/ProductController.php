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
            echo '<script>alert("Only jpeg, png, svg are accepted")</script>';
        }
    }

    public function getAllProductsAsync()
    {
        echo json_encode($this->productModel->getAllProductsAsync());
    }

    private function validateFormatImage($imageName)
    {
        if ($imageName == "image/jpeg" ||  $imageName == "image/pjpeg" ||  $imageName == "image/png" || $imageName == "image/svg+xml")
            return true;
        return false;
    }

    public function getProductsBySearch()
    {   
        echo json_encode($this->productModel->getProductsBySearch($_POST['productName'], $_POST['categoryType']));
    }

    public function getAllProducts()
    {
        return $this->productModel->getAllProducts();
    }

    public function getAllProductsToPromo()
    {
        return $this->productModel->getAllProductsToPromo();
    }

    public function getAllCategories()
    {
        return $this->categoryController->getAllCategories();
    }

    public function getProductsPromotionByDate()
    {
        echo json_encode($this->productModel->getProductsPromotionByDate());
    }

    public function insertProductLike()
    {
        echo json_encode($this->productModel->insertProductLike($_POST['productId']));
    }

    public function getProductsBySort()
    {
        if($_POST['sortType'] == "Lower cost"){
            echo json_encode($this->productModel->getProductsAscByPrice());
        }else{
            echo json_encode($this->productModel->getProductsDescByPrice());
        }
    }

    public function deleteProduct()
    {
        echo json_encode($this->productModel->deleteProduct($_POST['productId']));
    }

    public function showProductManageView()
    {
        $this->view->show("productManageView.php", $this->getAllProducts());
    }

    public function showProductRegisterView()
    {
        $this->view->show("productRegisterView.php", $this->categoryController->getAllCategories());
    }
}
