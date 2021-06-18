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
            'passwordConfirmedCustomer' => $_POST['passwordConfirmedCustomer']
        ));
    }
}
