<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/class/menuPrincipal.php';
require_once $root . '/class/conBD.php';
require_once $root . '/class/DAO/clientesDAO.php';
require_once './cont/perfil.php';


$BD = new conBD();
$con = $BD->conectarBD("Falha ao conectar, erro na instrução SQL");


if (!(isset($_POST['est'])) && isset($_SESSION['login'])) {
    $op = 3;
    $obj = new clientesDAO($op, $con);
    $registro = $obj->consultarUsuario($con);
//        $obj->consultarUsuario($con);
    
    $BD->finalizarBD($con);
} else if ($_POST['est'] == "alt") {
    $op = 2;
    $obj = new clientesDAO($op, $con);
    $BD->finalizarBD($con);
} else if ($_POST['est'] == "del") {
    $op = 4;
    $obj = new clientesDAO($op, $con);
    $BD->finalizarBD($con);
}
else{
    echo 'Faça login primeiramente';
    
    exit(0);
}

session_abort();
$header = new htmlHeader();
$menu = new menuPrincipal(1);
?>

<!-- Conteúdo -->

<?php
    $objTemp = new perfil($registro);

?>

<?php
$rodape = new htmlFooter();

