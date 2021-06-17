<?php

class AdminModel
{
    public function __construct()
    {
    }

    public function registerAdmin()
    {
        return ConnectorApi::useHttpPostApi(array(
            'userNameAdmin' => $_POST['userNameAdmin'],
            'passwordAdmin' => $_POST['passwordAdmin'],
            'passwordConfirmedAdmin' => $_POST['passwordConfirmedAdmin']
        ));
    }
}
