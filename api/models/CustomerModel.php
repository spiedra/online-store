<?php

class CustomerModel {

    protected $database;

    public function __construct() {
        require_once 'libs/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function getAllActors() {
        $query = $this->database->prepare("call sp_get_actors()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    public function registerActor($actorName, $actorLastName) {
        $query = $this->database->prepare("call sp_insert_actors('$actorName','$actorLastName')");
        $query->execute();
        $query->closeCursor();
    }

}

?>