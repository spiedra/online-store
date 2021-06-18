<?php

class CustomerController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        require_once 'model/CustomerModel.php';
        $this->view = new View();
        $this->customerModel = new CustomerModel();
    }

    public function registerCustomer()
    {
        if (strcmp($_POST['passwordCustomer'], $_POST['passwordConfirmedCustomer']) === 0) {
            echo '<script>alert("' . $this->customerModel->registerCustomer() . '")</script>';
            $this->showSignInView();
        } else {
            echo '<script>alert("Passwords do not match")</script>';
            $this->showSignInView();
        }
    }

    public function showSignInView()
    {
        $this->view->show("signInView.php", null);
    }
}
