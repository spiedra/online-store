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
        $dataArray = array(
            'nameProduct' => $_POST['nameProduct'],
            'priceProduct' => $_POST['priceProduct'],
            'descriptionProduct' => $_POST['descriptionProduct'],
            'imageFile' => $_POST['imageFile'],
            'categorySelected' => $_POST['categorySelected']
        );

        if (ConnectorApi::useHttpPostApi($dataArray) == 1) {
            echo '<script>alert("Successfully registered)</script>';
            $this->showProductRegisterView();
        } else {
            echo '<script>alert("Product is alredy registered")</script>';
            $this->showProductRegisterView();
        }
    }

    public function getCategories()
    {
        # code...
    }

    public function showProductRegisterView()
    {
        $this->view->show("productRegisterView.php", null);
    }
}
