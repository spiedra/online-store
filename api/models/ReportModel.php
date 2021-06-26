<?php

class ReportModel
{

    protected $database;

    public function __construct()
    {
        require_once 'libsApi/SPDO.php';
        $this->database = SPDO::singleton();
    }

    public function GetAllProductsSoldApi()
    {
        $query = $this->database->prepare("call sp_GET_REPORT_SALES()");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function GetProductsSoldSearchApi($startDate, $endDate)
    {
        $query = $this->database->prepare("call sp_GET_REPORT_SALES_SEARCH('$startDate', '$endDate')");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }

    public function GetDetailsProductsSoldApi($orderHeaderid)
    {
        $query = $this->database->prepare("call sp_GET_REPORT_SALES_DETAILS('$orderHeaderid')");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }
}
