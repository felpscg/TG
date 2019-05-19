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
require_once './cont/reserva.php';
$header = new htmlHeader();
session_abort();
new menuPrincipal(5);
?>
<script charset='utf-8' type='text/javascript' src='../js/vaga-reserva.js' defer='defer'></script>
<link rel='stylesheet' type='text/css' href='../css/vaga-reserva.css'>

<!-- Conteúdo -->

<?php
new reserva();
?>

<!--Ródape-->
<?php
new htmlFooter();
?>
