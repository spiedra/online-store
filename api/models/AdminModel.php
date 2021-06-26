<?php

class AdminModel {

    protected $database;

    public function __construct() {
        require_once 'libsApi/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function RegisterAdminApi($userNameAdmin, $passwordAdmin) {
        $query = $this->database->prepare("call sp_REGISTER_ADMIN(:param_USER_NAME, :param_PASSWORD, @out_RETURN)");
        $query->bindParam(':param_USER_NAME', $userNameAdmin); 
        $query->bindParam(':param_PASSWORD', $passwordAdmin); 
        $query->execute();
        $result = $this->database->query("select @out_RETURN")->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result['@out_RETURN'];
    }
}

?>