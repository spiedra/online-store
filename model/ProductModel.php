<?php

class ProductModel {

    protected $database;

    public function __construct() {
        require_once 'libs/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function registerProduct($name, $price, $description, $image, $category) {
        $query = $this->database->prepare("call sp_REGISTER_PRODUCT(:param_NAME, :param_PRICE, :param_DESCRIPTION, :param_IMAGE, :param_CATEGORY, @out_RETURN)");
        $query->bindParam(':param_NAME', $name); 
        $query->bindParam(':param_PRICE', $price); 
        $query->bindParam(':param_DESCRIPTION', $description); 
        $query->bindParam(':param_IMAGE', $image); 
        $query->bindParam(':param_CATEGORY', $category); 
        $query->execute();
        $result = $this->database->query("select @out_RETURN")->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result['@out_RETURN'];
    }
}

?>