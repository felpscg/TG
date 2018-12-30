<?php

/**
 * Description of conBD
 *
 * @author Felipe Corrêa Gomes
 * Criado em 29/12/2018
 */
class conBD {

    private $user = "root";
    private $key = "Felipe@CG";
    private $host = "localhost";
    private $nameDb = "tg";

    function getUser() {
        return $this->user;
    }

    function getKey() {
        return $this->key;
    }

    function getHost() {
        return $this->host;
    }

    function getNameDb() {
        return $this->nameDb;
    }

    protected function iniciar() {
        
    }

    function conectarBD($falha) {
        $user = $this->getUser();
        $key = $this->getKey();
        $host = $this->getHost();
        $nameDb = $this->getNameDb();
        mysqli_connect($host, $user, $key, $nameDb) or die($falha);
    }

    function finalizar($linkBD) {
        mysqli_close($linkBD);
    }

}
