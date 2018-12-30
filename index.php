<!DOCTYPE html>
<?php
require_once './autoload.php';
require_once './template/htmlHeader.php';
require_once './template/htmlFooter.php';
$rootfile = new INDEX\autoload();
$ROOT = $rootfile->rootFile();
$header = new htmlHeader();
$header->header($ROOT);
?>
<div id='m-bk'>
    <div class='item-p'>
        <a href="inicio.php"><img class="item-p-m" src="img/parking.png"/></a>
    </div>
    <div class='item-s'>
        <a href="inicio.php"><li class='item-s-l ativo' >Início</li></a>
        <!--<a href="cadastro.php"><li class='item-s-l'>Cadastro</li></a>-->
        <a href="perfil.php"><li class='item-s-l'>Perfil</li></a>
        <a href="reserva.php"><li class='item-s-l'>Reserva</li></a>
        <a href="vagas.php"><li class='item-s-l'>Vagas</li></a>
        <a href="sobre"><li class='item-s-l'>Sobre</li></a>

    </div>
    <div class='item-t'>
        <li class='item-t-l'>
            <input type="checkbox" value="0" name="tela-checkbox-d" id="tela-checkbox-d" onclick="telaInteira();"/>
            <label for="tela-checkbox-d"></label>
        </li>
        <li class='item-t-l ativo-l'>Login</li>
    </div>
</div>    
<!----------------------------->
<div id='m-bksec'>
    <div class='item-psec'>
        <a href="menu.html"><img class="item-p-msec" src="img/parking.png"/></a>
    </div>
    <div class="top-checkbox">

        <input type="checkbox" value="0" name="campo-checkbox" id="campo-checkbox" onclick="exibeItens('item-ssec');"/>
        <label for="campo-checkbox"></label>
        <input type="checkbox" value="0" name="tela-checkbox" id="tela-checkbox" onclick="telaInteira();"/>
        <label for="tela-checkbox"></label>
    </div>
    <div id='item-ssec'>
        <a href="inicio.php"><li class='item-s-lsec ativo'>Início</li></a>
        <!--<a href="cadastro.php"><li class='item-s-l'>Cadastro</li></a>-->
        <a href="perfil.php"><li class='item-s-lsec'>Perfil</li></a>
        <a href="reserva.php"><li class='item-s-lsec'>Reserva</li></a>
        <a href="vagas.php"><li class='item-s-lsec'>Vagas</li></a>
        <a href="sobre"><li class='item-s-lsec'>Sobre</li></a>
        <a href="login.php"><li class='item-t-lsec ativo-l'>Login</li></a>
    </div>


</div>
<div id='corpo' >

    <p>Teste aaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>
    <p>Teste</p>

</div>
<footer style='position:relative; top:10px; float:bottom;'>

    <p>Outro teste</p>
</footer>
</body>
</html>

