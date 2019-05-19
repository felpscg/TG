<!DOCTYPE html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/class/menuPrincipal.php';
require_once $root . '/class/conBD.php';
require_once './cont/problema.php';
?>

<?php
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
