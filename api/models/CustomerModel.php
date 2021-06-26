<?php

class CustomerModel
{

    protected $database;

    public function __construct()
    {
        require_once 'libsApi/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function RegisterCustomerApi($userNameCustomer, $passwordCustomer, $firstName, $lastName, $dateBirth, $address)
    {
        $query = $this->database->prepare("call sp_REGISTER_CUSTOMER(:param_USER_NAME
            , :param_PASSWORD
            , :param_FIRST_NAME
            , :param_LAST_NAME
            , :param_DATE_BIRTH
            , :param_ADDRESS
            , @out_RETURN)");
        $query->bindParam(':param_USER_NAME', $userNameCustomer);
        $query->bindParam(':param_PASSWORD', $passwordCustomer);
        $query->bindParam(':param_FIRST_NAME', $firstName);
        $query->bindParam(':param_LAST_NAME', $lastName);
        $query->bindParam(':param_DATE_BIRTH', $dateBirth);
        $query->bindParam(':param_ADDRESS', $address);
        $query->execute();
        $result = $this->database->query("select @out_RETURN")->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result['@out_RETURN'];
    }
}
