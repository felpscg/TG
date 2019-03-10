<?php
session_start();
session_destroy();
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/class/menuPrincipal.php';
require_once $root . '/class/conBD.php';
require_once './cont/cadastrar.php';

$BD = new conBD();
$con = $BD->conectarBD("Falha ao conectar, erro na instrução SQL");
// função inicia o cadastro
if (isset($_POST['est'])) {
    require_once $root . '/class/DAO/clientesDAO.php';
    $op = 1;
    $obj = new clientesDAO($op, $con);
    $BD->finalizarBD($con);
}

$header = new htmlHeader();
$menu = new menuPrincipal(1);
?>

<!-- Conteúdo -->

<?php
$conteudo = new cadastrar();
?>

<?php
$rodape = new htmlFooter();
?>
