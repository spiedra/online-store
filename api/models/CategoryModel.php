<?php

class CategoryModel {

    protected $database;

    public function __construct() {
        require_once 'libsApi/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function RegisterCategoryApi($categoryType){
        $query = $this->database->prepare("call sp_REGISTER_CATEGORY(:param_TYPE, @out_RETURN)");
        $query->bindParam(':param_TYPE', $categoryType); 
        $query->execute();
        $result = $this->database->query("select @out_RETURN")->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result['@out_RETURN'];
    }

    public function GetAllCategoriesApi() {
        $query = $this->database->prepare("call b97452_proyecto2_if4101.sp_GET_ALL_CATEGORIES()");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }
}
