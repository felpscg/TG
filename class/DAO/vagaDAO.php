<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/class/DAO/clientesDAO.php';

$BD = new conBD();
$con = $BD->conectarBD("Falha ao conectar, erro na instrução SQL");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_FLOAT);
$presenca = filter_input(INPUT_GET, 'presenca', FILTER_SANITIZE_NUMBER_FLOAT);
if (is_null($presenca) || is_null($id)) {
    //Gravar log de erros
    die("Dados inválidos");
}

$sql = "UPDATE `tg`.`vagas` SET `estadovaga`='2' WHERE  `numerovaga`=$id;";
mysqli_query($con, $sql);

class vagaDAO {
    //put your code here
}
