<?php
    class AdminController{
        public function __construct() {
            $this->view = new View();
        }

        public function adminLogin(){
           echo $_POST['userName']." ".$_POST['password'];
        }
    
        public function showAdminView() {
            $this->view->show("adminView.php", null);
        }
    }
?>