<!DOCTYPE html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/template/htmlHeader.php';
require_once $root.'/template/htmlFooter.php';
require_once $root.'/class/menuPrincipal.php';
require_once './cont/index.php';
$header = new htmlHeader();

$menu = new menuPrincipal(0);
?>

<!-- Conteúdo -->

<?php
$conteudo = new index();
?>

<!--Ródape-->
<?php
$rodape = new htmlFooter();
?>


