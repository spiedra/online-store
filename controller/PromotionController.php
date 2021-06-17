<?php
class PromotionController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function showPromotionView()
    {
        $this->view->show("promotionView.php", null);
    }
}
