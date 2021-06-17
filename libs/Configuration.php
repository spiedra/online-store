<?php
require 'libs/Config.php';
$config = Config::singleton();

$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');