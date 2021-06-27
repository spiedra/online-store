<?php
class AdminController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        require_once 'model/AdminModel.php';
        $this->view = new View();
        $this->adminModel = new AdminModel();
    }

    public function registerAdmin()
    {
        if (strcmp($_POST['passwordAdmin'], $_POST['passwordConfirmedAdmin']) === 0) {
            if ($this->adminModel->registerAdmin() == 1) {
                echo '<script>alert("Successfully registered")</script>';
                $this->showAdminRegisterView();
            } else {
                echo '<script>alert("Admin is alredy registered")</script>';
                $this->showAdminRegisterView();
            }
        } else {
            echo '<script>alert("Passwords do not match")</script>';
            $this->showAdminRegisterView();
        }
    }

    public function getAllAdmin()
    {
        return $this->adminModel->getAllAdmin();
    }

    public function updateAdmin()
    {
        echo json_encode($this->adminModel->updateAdmin($_POST['adminId'], $_POST['newUserName']));
    }

    public function deleteAdmin()
    {
        echo $this->adminModel->deleteAdmin($_POST['adminId']);
    }

    public function showAdminManageView()
    {
        $this->view->show("adminManageView.php", $this->getAllAdmin());
    }

    public function showAdminRegisterView()
    {
        $this->view->show("adminRegisterView.php", null);
    }
}
