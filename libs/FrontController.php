<?php

class FrontController {

    static function main() {
        require 'libs/View.php';
        require 'libs/Configuration.php';

        if (!empty($_GET['controller']))
            $controllerName = $_GET['controller'] . 'Controller';
        else
            $controllerName = 'IndexController';

        if (!empty($_GET['action']))
            $actionName = $_GET['action'];
        else
            $actionName = 'showIndexView';

        $pathController = $config->get('controllerFolder') . $controllerName . '.php';

        if (is_file($pathController))
            require $pathController;
        else
            die('Controller not found  - 404 not found');

        if (is_callable(array($controllerName, $actionName)) == false) {
            trigger_error($controllerName . '->' . $actionName . ' do not exist', E_USER_NOTICE);
            return FALSE;
        }

        $controller = new $controllerName();
        $controller->$actionName();
    }

}
