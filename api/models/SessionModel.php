<?php

class SessionModel {

    protected $database;

    public function __construct() {
        require_once 'libsApi/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function ValidateSessionApi($userName, $password) {
        $query = $this->database->prepare("call sp_VALIDATE_USER(:param_USER_NAME, :param_PASSWORD, @out_RETURN)");
        $query->bindParam(':param_USER_NAME', $userName); 
        $query->bindParam(':param_PASSWORD', $password); 
        $query->execute();
        $result = $this->database->query("select @out_RETURN")->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result['@out_RETURN'];
    }
}

?>