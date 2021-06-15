<?php
class AdminController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        $this->view = new View();
    }

    public function registerAdmin()
    {
        if (strcmp($_POST['passwordAdmin'], $_POST['passwordConfirmedAdmin']) === 0) {
            $dataArray = array(
                'userNameAdmin' => $_POST['userNameAdmin'],
                'passwordAdmin' => $_POST['passwordAdmin'],
                'passwordConfirmedAdmin' => $_POST['passwordConfirmedAdmin']
            );

            if (ConnectorApi::useHttpPostApi($dataArray) == 1) {
                echo '<script>alert("Successfully registered)</script>';
                $this->showAdminView();
            }else{
                echo '<script>alert("Admin is alredy registered")</script>';
                $this->showAdminRegisterView();
            }
        } else {
            echo '<script>alert("Passwords do not match")</script>';
            $this->showAdminRegisterView();
        }
    }

    public function showProductRegisterView()
    {
        $this->view->show("productRegisterView.php", null);
    }

    public function showAdminRegisterView()
    {
        $this->view->show("adminRegisterView.php", null);
    }

    public function showAdminView()
    {
        $this->view->show("adminView.php", null);
    }
}
