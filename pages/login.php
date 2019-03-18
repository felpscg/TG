<!DOCTYPE html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/class/menuPrincipal.php';
require_once $root . '/class/conBD.php';
require_once './cont/login.php';
?>
<?php
$BD = new conBD();
$con = $BD->conectarBD("Falha ao conectar, erro na instrução SQL");
// função inicia o cadastro
if (isset($_POST['acesso'])) {
    require_once $root . '/class/DAO/clientesDAO.php';
    $loginmd5 = md5($_POST['login']);
    session_start();
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['senhamd5'] = md5($_POST['senha']);

    $op = 5;
    $ext = $loginmd5;
    $obj = new clientesDAO($op, $con,$ext);
    $BD->finalizarBD($con);
    exit(0);
}

?>
<?php
$header = new htmlHeader();
$menu = new menuPrincipal(4);
?>

<!-- Conteudo -->

<?php
$conteudo = new login();
?>
<script>
    function submit() {
        document.formp.submit();
    }
</script>
<div id='corpo' >
    <form id='formp' name='formp' method="POST" action="#">
        <fieldset>
            <legend>Login</legend>
            <div class='campo'>
                <div class='nome-campo'>
                    <p><span>E-mail:*</span></p>
                    <p><span>Senha:*</span></p>
                </div>
                <div class='item-campo'>
                    <p><input type='text' name='login' /></p>
                    <p><input type='text' name='senha' /></p>

                </div>
                <p><a href="cadastrar.php"><input type="button" value="Cadastrar"/></a>
                    <input type="hidden" name="acesso" value="true"/>
                    <input type="button" value='Prosseguir' onclick="submit();"/></p>
            </div>
        </fieldset>
    </form>
</div>

<!--Rodape-->
<?php
$rodape = new htmlFooter();
?>
