<?php
require 'libsApi/Config.php';
$config = Config::singleton();

$config->set('controllerFolder', 'controllers/');
$config->set('modelFolder', 'models/');

$config->set('dbhost', '163.178.107.10'); 
$config->set('dbname', 'B97452_PROYECTO2_IF4101');
$config->set('dbuser', 'laboratorios');
$config->set('dbpass', 'KmZpo.2796');

// $config->set('dbhost', 'localhost'); 
// $config->set('dbname', 'b97452_proyecto2_if4101');
// $config->set('dbuser', 'root');
// $config->set('dbpass', 'piedra');