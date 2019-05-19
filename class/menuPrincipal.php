<?php

/**
 * Description of menuPrincipal
 *
 * @author Felipe Corrêa Gomes
 * Criado em 29/12/2018
 */
class menuPrincipal {

    //conteudo do menu
    private $conteudoMenu = null;
    //Nome dos itens
    private $itemMenu = array('Inicio', '', 'Vagas', 'Sobre', 'Conectar', 'Reserva');
    //ainda não sei ------
    private $ativoMenu = array(0 => '', 1 => '', 2 => '', 3 => '', 4 => '', 5 => '');
    //link dos itens do menu
    private $linkMenu = array('index.php', ' ', 'vaga.php', 'sobre.php', 'login.php', 'reserva.php');
    //imagem do menu
    private $imagemMenu = '../img/parking.png';

    public function getConteudoMenu() {
        return $this->conteudoMenu;
    }

    public function getItemMenu() {
        return $this->itemMenu;
    }

    public function getAtivoMenu() {
        return $this->ativoMenu;
    }

    public function getLinkMenu() {
        return $this->linkMenu;
    }

    public function getImagemMenu() {
        return $this->imagemMenu;
    }

    function setConteudoMenu($conteudoMenu) {
        $this->conteudoMenu = $conteudoMenu;
    }

    function setItemMenu($itemMenut, $posicao) {
        $this->itemMenu[$posicao] = $itemMenut;
    }

    function setAtivoMenu($ativoMenu, $posicao) {
        $this->ativoMenu[$posicao] = $ativoMenu;
    }

    function setLinkMenu($linkMenu, $posicao) {
        $this->linkMenu[$posicao] = $linkMenu;
    }

    public function __construct($page) {
        session_start();
        $this->setAtivoMenu('ativo', $page);
        $this->alterarConteudoMenu();
        echo $this->getConteudoMenu();
        session_abort();
    }

    public function verificarSessao() {
        if ((!isset($_SESSION['login'])) and ( !isset($_SESSION['senha']))) {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            $this->setItemMenu("Cadastro", 1);
            $this->setLinkMenu("cadastrar.php", 1);
            return 1;
        } else if ((isset($_SESSION['login'])) and ( isset($_SESSION['senhamd5']))) {
            $nomeUser = $_SESSION['login'];
            $bd = mysqli_connect("localhost", "felipecg", "", "tg");
            $registro = mysqli_query($bd, "select nome from usuarios where email = '$nomeUser' OR cpf = '$nomeUser'");
            $registro = mysqli_fetch_array($registro);
            
            $this->setItemMenu("Perfil", 1);
            $this->setLinkMenu("perfil.php", 1);
            $this->setItemMenu("Sair", 4);
            $this->setLinkMenu("logout.php", 4);
            echo "<div id ='nome-u'>Bem Vindo $registro[nome]</div>";

            return 0;
        } else {
            session_destroy();
            return -1;
        }
    }

    public function alterarConteudoMenu() {
        $imagem = $this->getImagemMenu();
        
        ////////
        $valorTemp = $this->verificarSessao();
        $link = $this->getLinkMenu();
        //$texto = $this->getativoMenu();
        $item = $this->getItemMenu();
        
        $ativo = $this->getAtivoMenu();
        //condicional do menu de acordo com a sessao conectada
        $tempMenuReserva = ($valorTemp == 1) ? "" : (($valorTemp == 0) ? "<a href='$link[5]'><li class='item-s-l $ativo[5]'>$item[5]</li></a>\n" : "<script>alert('Erro no menu $valorTemp __ $_SESSION[login]');</script>");
        $tempMenuReservaResponsivo = ($valorTemp == 1) ? "" : (($valorTemp == 0) ? "<a href='$link[5]'><li class='item-s-lsec $ativo[5]'>$item[5]</li></a>\n" : "<script>alert('Erro no menu');</script>");
        //$tempMenuS = ($valorTemp == 1)?"<li class='item-t-l ativo-l'>Login</li>":(($valorTemp == 0)?"<li class='item-t-l ativo-l'>$item[1]</li>":"<script>alert('Erro no menu');</script>");

        $conteudoMenu = "<div id='m-bk'>\n" .
                "<div class='item-p'>\n" .
                "<a href='$link[0]'><img class='item-p-m' src='$imagem'/><span style='font-size:1.7em'>Parking</span></a>\n" .
                "</div>\n" .
                "<div class='item-s'>\n" .
                "<a href='$link[0]'><li class='item-s-l $ativo[0]' >$item[0]</li></a>\n" .
                "<a href='$link[1]'><li class='item-s-l $ativo[1]'>$item[1]</li></a>\n" .
                $tempMenuReserva .
                "\n<a href='$link[2]'><li class='item-s-l $ativo[2]'>$item[2]</li></a>\n" .
                "<a href='$link[3]'><li class='item-s-l $ativo[3]'>$item[3]</li></a>\n" .
                "</div>\n" .
                "<div class='item-t'>\n" .
                "<li class='item-t-l'>\n" .
                "<input type='checkbox' value='0' name='tela-checkbox-d' id='tela-checkbox-d' onclick='telaInteira();'/>\n" .
                "<label for='tela-checkbox-d'></label>\n" .
                "</li>\n" .
                "<a href='$link[4]'><li class='item-t-l ativo-l'>$item[4]</li></a>\n" .
                "</div>\n" .
                "</div>\n<!-- ------------------------- -->";


        $conteudoMenuResponsivo = "<div id='m-bksec'> \n" .
                "<div class='item-psec'>\n" .
                "<a href='$link[0]'><img class='item-p-msec' src='$imagem'/></a>\n" .
                "</div>\n" .
                "<div class='top-checkbox'>\n" .
                "<input type=\"checkbox\" value=\"0\" name=\"campo-checkbox\" id=\"campo-checkbox\" onclick=\"exibeItens('item-ssec');\"/>\n" .
                "<label for='campo-checkbox'></label>\n" .
                "<input type='checkbox' value='0' name='tela-checkbox' id='tela-checkbox' onclick='telaInteira();'/>\n" .
                "<label for='tela-checkbox'></label>\n" .
                "</div>\n" .
                "<div id='item-ssec'>\n" .
                "<a href='$link[0]'><li class='item-s-lsec $ativo[0]'>$item[0]</li></a>\n" .
                "<a href='$link[1]'><li class='item-s-lsec $ativo[1]'>$item[1]</li></a>\n" .
                $tempMenuReservaResponsivo .
                "\n <a href='$link[2]'><li class='item-s-lsec $ativo[2]'>$item[2]</li></a>\n" .
                "<a href='$link[3]'><li class='item-s-lsec $ativo[3]'>$item[3]</li></a>\n" .
                "<a href='$link[4]'><li class='item-t-lsec $ativo[4]'>$item[4]</li></a>\n" .
                "</div>" .
                "</div>";
        $conteudoMenu .= $conteudoMenuResponsivo;
        $this->setConteudoMenu($conteudoMenu);
        
    }

}
