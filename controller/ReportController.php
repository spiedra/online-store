<?php

class ReportController {

    public function __construct() {
        require_once 'Utility/ConnectorApi.php';
        require_once 'model/ReportModel.php';
        $this->reportModel = new ReportModel();
        $this->view = new View();
    }

    public function getAllProductsSold()
    {
        echo json_encode($this->reportModel->getProductsSold());
    }

    public function getDetailsProductSold()
    {
        echo json_encode($this->reportModel->getDetailsProductSold());
    }

    public function getProductsSoldSearch()
    {
        echo json_encode($this->reportModel->getProductsSoldSearch());
    }

    public function showReportView() {
        $this->view->show("reportView.php", null);
    }
}
