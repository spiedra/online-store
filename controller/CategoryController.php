<?php
class CategoryController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        $this->view = new View();
    }

    public function registerCategory(){
        $dataArray = array(
            'categoryType' => $_POST['categoryType'],
        );

        if (ConnectorApi::useHttpPostApi($dataArray) == 1) {
            echo '<script>alert("Successfully registered)</script>';
            $this->showCategoryRegisterView();
        }else{
            echo '<script>alert("Category is alredy registered")</script>';
            $this->showCategoryRegisterView();
        }
    }

    public function getAllCategories()
    {
        return ConnectorApi::useHttpGetApi();
    }

    public function showCategoryRegisterView(){
        $this->view->show("categoryRegisterView.php", null);
    }
}
