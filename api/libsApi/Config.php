<?php

class Config {

    private $vars;
    private static $instance;

    private function __construct() {
        $this->vars = array();
    }

    public function set($nombreAtributo, $valor) {
        if (!isset($this->vars[$nombreAtributo])) {
            $this->vars[$nombreAtributo] = $valor;
        }
    }

    public function get($nombreAtributo) {
        if (isset($this->vars[$nombreAtributo])) {
            return $this->vars[$nombreAtributo];
        }
    }

    public static function singleton() {
        if (!isset(self::$instance)) {
            $tmpClass = __CLASS__;
            self::$instance = new $tmpClass;
        }
        return self::$instance;
    }

}

?>
