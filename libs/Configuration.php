<?php
require 'libs/Config.php';
$config = Config::singleton();

$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');

$config->set('dbhost', 'localhost'); 
$config->set('dbname', 'b97452_proyecto2_if4101');
$config->set('dbuser', 'root');
$config->set('dbpass', 'piedra');