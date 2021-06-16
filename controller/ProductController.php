<?php
class ProductController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        require 'CategoryController.php';
        $this->view = new View();
        $this->categoryController = new CategoryController();
    }

    public function registerProduct()
    {
        if ($this->validateFormatImage($_FILES['imageFile']['type'])) {

            if ($this->saveImageProduct()) {
                $dataArray = array(
                    'nameProduct' => $_POST['nameProduct'],
                    'priceProduct' => $_POST['priceProduct'],
                    'descriptionProduct' => $_POST['descriptionProduct'],
                    'categorySelected' => $_POST['categorySelected'],
                    'imageFile' =>  $_FILES['imageFile']['name']
                );
                if (ConnectorApi::useHttpPostApi($dataArray) == 1) {
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

    private function saveImageProduct()
    {
        $folderPath = "public/assets/";
        if (file_exists($folderPath) || @mkdir($folderPath)) {
            if (@move_uploaded_file($_FILES["imageFile"]["tmp_name"], $folderPath . $_FILES["imageFile"]["name"])) {
                return true;
            }
        }
        return false;
    }

    private function validateFormatImage($imageName)
    {
        if ($imageName == "image/jpeg" ||  $imageName == "image/pjpeg" ||  $imageName == "image/png")
            return true;
        return false;
    }

    private function getAllCategories()
    {
        return  $this->categoryController->getAllCategories();
    }

    public function showProductRegisterView()
    {
        $this->view->show("productRegisterView.php", $this->categoryController->getAllCategories());
    }
}
