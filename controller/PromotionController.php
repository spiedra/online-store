<?php
class PromotionController
{
    public function __construct()
    {
        require_once 'controller/ProductController.php';
        require_once 'model/PromotionModel.php';
        $this->view = new View();
        $this->productController = new ProductController();
        $this->promotionModel = new PromotionModel();
    }

    public function createPromotion()
    {
        echo json_encode($this->promotionModel->createPromotion());
    }

    public function getAllProducts()
    {
        return $this->productController->getAllProductsToPromo();
    }

    public function getPromotionByProduct()
    {
       echo json_encode($this->promotionModel->getPromotionByProduct());
    }

    public function showPromotionView()
    {
        $this->view->show("promotionView.php", $this->getAllProducts());
    }
}
