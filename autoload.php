<?php

/**
 * Description of autoload
 *  Necessario para carregar as dependencias e os plugins
 * @author Felipe Corrêa Gomes
 * Criado em 24/12/2018
 * 
 */
namespace INDEX;
class autoload {

    private $ROOT;

    private function getROOT() {
        return $this->ROOT;
    }

    private function setROOT($root) {
        $this->ROOT = $root;
    }
    function __construct() {
        $this->setROOT($_SERVER['DOCUMENT_ROOT']);
    }
    public function rootFile() {
        return $this->getROOT();
    }

}
