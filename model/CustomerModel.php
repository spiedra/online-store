<?php

class CustomerModel
{

    public function __construct()
    {
        require_once 'libs/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function registerCustomer()
    {
        return ConnectorApi::useHttpPostApi(array(
            'userNameCustomer' => $_POST['userNameCustomer'],
            'passwordCustomer' => $_POST['passwordCustomer'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'dateBirth' => $_POST['dateBirth'],
            'address' => $_POST['address'],
        ));
    }

    public function addProductToShoppingCart($userName, $productId)
    {
        $query = $this->database->prepare("call sp_REGISTER_USER_PRODUCT(:param_USER_NAME, :param_ID_PRODUCT, @out_RETURN)");
        $query->bindParam(':param_USER_NAME', $userName);
        $query->bindParam(':param_ID_PRODUCT', $productId);
        $query->execute();
        $result = $this->database->query("select @out_RETURN")->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result['@out_RETURN'];
    } 

    public function getProductsByCustomer($userName)
    {
        $query = $this->database->prepare("call sp_GET_ALL_PRODUCTS_CUSTOMER('$userName')");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function deleteProductCart($userName, $productId)
    {
        $query = $this->database->prepare("call sp_DELETE_PRODUCT_CUSTOMER('$userName', '$productId')");
        $query->execute();
        $query->closeCursor();
    }
}
