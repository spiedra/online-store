<?php

class CustomerModel {

    protected $database;

    public function __construct() {
        require_once 'libs/SPDO.php';
        $this->database = SPDO::singleton();
    }
}
