<?php

class AdminModel
{
    public function __construct()
    {
        require_once 'libs/SPDO.php';
        require_once 'Utility/ConnApiBccr.php';
        $this->database = SPDO::singleton();
    }

    public function registerAdmin()
    {
        return ConnectorApi::useHttpPostApi(array(
            'userNameAdmin' => $_POST['userNameAdmin'],
            'passwordAdmin' => $_POST['passwordAdmin'],
            'passwordConfirmedAdmin' => $_POST['passwordConfirmedAdmin']
        ));
    }

    public function updateAdmin($adminId, $newUserName)
    {
        $query = $this->database->prepare("call sp_UPDATE_ADMIN('$adminId', '$newUserName')");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function deleteAdmin($adminId)
    {
        $query = $this->database->prepare("call sp_DELETE_ADMIN('$adminId')");
        $query->execute();
        $query->closeCursor();
        return "Admin successfully removed";
    }

    public function getAllAdmin()
    {
        return ConnectorApi::useHttpGetApi("5");
    }
}
