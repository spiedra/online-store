<?php

class CategoryModel {

    protected $database;

    public function __construct() {
        require_once 'libs/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function getAllCategories() {
        $query = $this->database->prepare("call b97452_proyecto2_if4101.sp_GET_ALL_CATEGORIES()");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }
}

?>