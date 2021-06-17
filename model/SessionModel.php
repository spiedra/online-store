<?php

class SessionModel
{
    public function __construct()
    {
    }

    public function validateSession()
    {
       return ConnectorApi::useHttpPostApi(array(
            'userName' => $_POST['userName'],
            'password' => $_POST['password']
        ));
    }
}
