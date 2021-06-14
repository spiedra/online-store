<?php
    class AdminController{
        public function __construct() {
            $this->view = new View();
        }

        public function adminLogin(){
           
        }
    
        public function showAdminView() {
            $this->view->show("adminView.php", null);
        }
    }
?>