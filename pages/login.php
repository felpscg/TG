<!DOCTYPE html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/class/menuPrincipal.php';
require_once './cont/login.php';
$header = new htmlHeader();
$menu = new menuPrincipal(4);
?>

<!-- Conteudo -->

<?php
$conteudo = new login();
?>
<div id='corpo' >

    <fieldset>
        <legend>Login</legend>
        <div class='campo'>
            <div class='nome-campo'>
                <p><span>E-mail:*</span></p>
                <p><span>Senha:*</span></p>
            </div>
            <div class='item-campo'>
                <p><input type='text' name='email' /></p>
                <p><input type='text' name='senha' /></p>
            </div>
        </div>
    </fieldset>

</div>

<!--Rodape-->
<?php
$rodape = new htmlFooter();
?>
