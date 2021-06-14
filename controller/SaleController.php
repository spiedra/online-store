<?php
    class SaleController{
        public function __construct() {
            $this->view = new View();
        }

        public function clientLogIn(){
           
        }

        public function clientSignIn(){
            
        }
    
        public function showAdminView() {
            $this->view->show("saleView.php", null);
        }
    }
