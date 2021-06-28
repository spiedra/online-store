<?php
class CategoryController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        require_once 'model/CategoryModel.php';
        $this->view = new View();
        $this->categoryModel = new CategoryModel();
    }

    public function registerCategory()
    {
        if ($this->categoryModel->registerCategory() == 1) {
            echo '<script>alert("Successfully registered")</script>';
            $this->showCategoryRegisterView();
        } else {
            echo '<script>alert("Category is alredy registered")</script>';
            $this->showCategoryRegisterView();
        }
    }

    public function getAllCategories()
    {
        return $this->categoryModel->getAllCategories();
    }

    public function getAllCategoriesAsync()
    {
        echo json_encode($this->categoryModel->getAllCategories());
    }

    public function showCategoryRegisterView()
    {
        $this->view->show("categoryRegisterView.php", null);
    }
}
