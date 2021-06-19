<?php

class CustomerModel
{

    public function __construct()
    {
    }

    public function registerCustomer()
    {
        return ConnectorApi::useHttpPostApi(array(
            'userNameCustomer' => $_POST['userNameCustomer'],
            'passwordCustomer' => $_POST['passwordCustomer'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'dateBirth' => $_POST['dateBirth'],
            'address' => $_POST['address'],
        ));
    }
}
