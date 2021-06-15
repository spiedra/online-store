<?php
    class AdminController{
        public function __construct() {
            $this->view = new View();
        }

        public function showProductRegisterView(){
            $this->view->show("productRegisterView.php", null);
        }
    
        public function showAdminView() {
            $this->view->show("adminView.php", null);
        }
    }
