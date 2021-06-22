<?php

class CustomerController
{
    public function __construct()
    {
        require_once 'Utility/ConnectorApi.php';
        require_once 'model/CustomerModel.php';
        $this->view = new View();
        $this->customerModel = new CustomerModel();
        session_start();
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
    
    public function addProductToCustomerCart(){
        if($this->customerModel->addProductToShoppingCart($_SESSION['userName'], $_POST['productId']) == 1){
            echo json_encode("Product added to shopping cart");
        }else{
            echo json_encode("The product is already in the shopping cart");
        }
    }

    public function getProductsByCustomer()
    {
        echo json_encode($this->customerModel->getProductsByCustomer($_SESSION['userName']));
    }

    public function deleteProductCart()
    {
        $this->customerModel->deleteProductCart($_SESSION['userName'], $_POST['productId']);
        echo json_encode(
            "Product removed"
        );
    }

    public function purchaseProducts()
    {
        
    }

    public function showSignInView()
    {
        $this->view->show("signInView.php", null);
    }
}
