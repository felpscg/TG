<?php

/**
 * Description of conBD
 *
 * @author Felipe Corrêa Gomes
 * Criado em 29/12/2018
 */
class conBD {

    private $user = "felipecg";
    private $key = "";
    private $host = "localhost";
    private $nameDb = "tg";

    function testeConstruct() {
        $conexao = $this->conectarBD("Erro interno");
    }

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

    function conectarBD($falha) {
        $user = $this->getUser();
        $key = $this->getKey();
        $host = $this->getHost();
        $nameDb = $this->getNameDb();
        $con = mysqli_connect($host, $user, $key, $nameDb) or die('null');
        return $con;
    }

    function finalizarBD($linkBD) {
        mysqli_close($linkBD);
        unset($linkBD);
    }

}
