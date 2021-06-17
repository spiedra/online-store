<?php

class SessionController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        require_once 'model/SessionModel.php';
        $this->view = new View();
        $this->sessionModel = new SessionModel();
        date_default_timezone_set('UTC');
        // header('Cache-Control: no cache');
        // session_cache_limiter('private_no_expire'); 
        // session_start();
    }

    public function showViewByRole()
    {
        switch ($this->sessionModel->validateSession()) {
            case -1:
                echo '<script>alert("User not found")</script>';
                $this->view->show("indexView.php", null);
                break;

            case 1:
                $this->view->show("adminMainView.php", null);
                break;

            case 2:
                $this->view->show("indexView.php", null);
                break;
        }
    }
}
