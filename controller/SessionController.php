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
        header('Cache-Control: no cache');
        session_cache_limiter('private_no_expire');
        session_start();
    }

    public function logOut()
    {
        session_unset();
        session_destroy();
        $this->view->show("indexView.php", null);
    }

    public function validateRol()
    {
        if (!isset($_SESSION['rol'])) {
            $this->view->show("indexView.php", null);
        } else {
            if ($_SESSION['rol'] == 1) {
                $this->view->show("adminMainView.php", null);
            } else {
                $this->view->show("customerMainView.php", null);
            }
        }
    }

    public function showViewByRole()
    {
        if (isset($_POST['userName'], $_POST['password'])) {
            $_SESSION['userName'] = $_POST['userName'];
            $_SESSION['rol'] = $this->sessionModel->validateSession();
            switch ($_SESSION['rol']) {
                case -1:
                    echo '<script>alert("User not found")</script>';
                    $this->view->show("indexView.php", null);
                    break;

                case 1:
                    $this->view->show("adminMainView.php", null);
                    break;

                case 2:
                    $this->view->show("customerMainView.php", null);
                    break;
            }
        } else {
            $this->validateRol();
        }
    }
}
