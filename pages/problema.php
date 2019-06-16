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
