<?php
class CustomerController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function clientLogIn()
    {
    }

    public function clientSignIn()
    {
        
    }

    public function showSignInView()
    {
        $this->view->show("signInView.php", null);
    }
}
