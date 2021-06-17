<?php

class IndexController {

    public function __construct() {
        $this->view = new View();
    }

    public function showIndexView() {
        $this->view->show("indexView.php", null);
    }
}
