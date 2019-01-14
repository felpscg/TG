<!DOCTYPE html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/class/menuPrincipal.php';
require_once './cont/vagas.php';
$header = new htmlHeader();

$menu = new menuPrincipal(2);
?>

<!-- Conteúdo -->

<?php
$conteudo = new vagas();
?>

<!--Ródape-->
<?php
$rodape = new htmlFooter();
?>
