<!DOCTYPE html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
session_start();
if((!isset($_SESSION['login'])) and ( !isset($_SESSION['senha']))){
    header('location:./login.php');
}
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/class/menuPrincipal.php';
require_once $root . '/class/conBD.php';
require_once './cont/problema.php';
session_abort();

$header = new htmlHeader();

if (isset($_POST['est'])) {

    require_once $root . '/class/conBD.php';
    $BD = new conBD();
    $con = $BD->conectarBD("Falha ao conectar, erro na instrução SQL");
    require_once $root . '/class/DAO/problemaDAO.php';
    if ($_POST['est'] == "cad") {
        $op = 1;
        $obj = new problemaDAO($op, $con);
        $BD->finalizarBD($con);
    }
}


$menu = new menuPrincipal(4);
?>

<!-- Conteudo -->

<?php
$conteudo = new problema();
?>


<!--Rodape-->
<?php
$rodape = new htmlFooter();
?>
