<?php

class SessionController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        $this->view = new View();
        header('Cache-Control: no cache');
        session_cache_limiter('private_no_expire'); 
        session_start();
    }

    public function manageSession()
    {
        $dataArray = array(
            'userName' => $_POST['userName'],
            'password' => $_POST['password']
        );
        $this->showViewByRole(ConnectorApi::useHttpPostApi($dataArray));
    }

    public function showViewByRole($role)
    {
        switch ($role) {
            case -1:
                echo '<script>alert("User not found")</script>';
                $this->view->show("indexView.php", null);
                break;

            case 1:
                $this->view->show("adminView.php", null);
                break;

            case 2:
                $this->view->show("indexView.php", null);
                break;
        }
    }
}
