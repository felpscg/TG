<?php
$root = $_SERVER['DOCUMENT_ROOT'];
session_start();
if ((!isset($_SESSION['login'])) and ( !isset($_SESSION['senha']))) {
    header('location:./login.php');
}
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/class/menuPrincipal.php';

require_once './cont/reserva.php';

$header = new htmlHeader();
session_abort();
if (isset($_POST['est'])) {

    require_once $root . '/class/conBD.php';
    $BD = new conBD();
    $con = $BD->conectarBD("Falha ao conectar, erro na instrução SQL");
    require_once $root . '/class/DAO/reservaDAO.php';
    if ($_POST['est'] == "cad") {
        $op = 1;
        $obj = new reservaDAO($op, $con);
        $BD->finalizarBD($con);
    } else if ($_POST['est'] == "del") {
        $op = 4;
        $obj = new reservaDAO($op, $con);
        $BD->finalizarBD($con);
    }
}
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
