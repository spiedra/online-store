<?php

class CustomerModel {

    protected $database;

    public function __construct() {
        require_once 'libs/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function registerCustomer($userNameCustomer, $passwordCustomer) {
        $query = $this->database->prepare("call sp_REGISTER_CUSTOMER(:param_USER_NAME, :param_PASSWORD, @out_RETURN)");
        $query->bindParam(':param_USER_NAME', $userNameCustomer); 
        $query->bindParam(':param_PASSWORD', $passwordCustomer); 
        $query->execute();
        $result = $this->database->query("select @out_RETURN")->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result['@out_RETURN'];
    }
}
