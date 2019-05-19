<!DOCTYPE html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/class/menuPrincipal.php';
require_once './cont/vaga.php';
$header = new htmlHeader();

$menu = new menuPrincipal(2);
?>
<script charset='utf-8' type='text/javascript' src='../js/vaga-reserva.js' defer='defer'></script>
<link rel='stylesheet' type='text/css' href='../css/vaga-reserva.css'>

<!-- Conteúdo -->

<?php
$conteudo = new vaga();
?>

<!--Ródape-->
<?php
$rodape = new htmlFooter();
?>
