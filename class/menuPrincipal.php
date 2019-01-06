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
    private $itemMenu = array('Inicio', 'Cadastro', 'Vagas', 'Sobre', 'Login', 'Reserva');
    //ainda não sei ------
    private $ativoMenu = array(0=>'',1=>'', 2=>'', 3=>'', 4=>'', 5=>'');
    //link dos itens do menu
    private $linkMenu = array('index.php', 'cadastrar.php', 'vagas.php', 'sobre.php', 'login.php', 'reserva.php');
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

    function setItemMenu($itemMenu, $posicao) {
        $this->itemMenu = $itemMenu[$posicao];
    }

    function setAtivoMenu($ativoMenu, $posicao) {
        $this->ativoMenu[$posicao] = $ativoMenu;
    }

    function setLinkMenu($linkMenu, $posicao) {
        $this->linkMenu = $linkMenu[$posicao];
    }

    public function __construct($page) {
        session_start();
        $this->setAtivoMenu('ativo', $page);
        $this->alterarConteudoMenu();
        echo $this->getConteudoMenu();
        session_abort();
    }

    public function verificarSessao() {
        if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            $this->setItemMenu("Cadastro", 1);
            $this->setLinkMenu("cadastro.php", 1);
            return 1;
        } elseif ((isset($_SESSION['login']) == true) and ( isset($_SESSION['senha']) == true)) {
            $nomeUser = $_SESSION['nome'];

            $this->setItemMenu("Perfil", 1);
            $this->setLinkMenu("perfil.php", 1);
            $this->setItemMenu("Sair", 4);
            $this->setLinkMenu("logon.php", 4);
            //echo "<div id ='nome-u'>Bem Vindo $nomeUser</div>";

            return 0;
        } else {
            return -1;
        }
    }

    public function alterarConteudoMenu() {
        $imagem = $this->getImagemMenu();
        $link = $this->getLinkMenu();
        //$texto = $this->getativoMenu();
        $item = $this->getItemMenu();
        $valorTemp = $this->verificarSessao();
        $ativo = $this->getAtivoMenu();
        //condicional do menu de acordo com a sessao conectada
        $tempMenuReserva = ($valorTemp == 1) ? "" : (($valorTemp == 0) ? "<a href='$link[5]'><li class='item-s-l $ativo[5]'>$item[5]</li></a>\n" : "<script>alert('Erro no menu');</script>");
        $tempMenuReservaResponsivo = ($valorTemp == 1) ? "" : (($valorTemp == 0) ? "<a href='$link[5]'><li class='item-s-lsec $ativo[5]'>$item[5]</li></a>\n" : "<script>alert('Erro no menu');</script>");
        //$tempMenuS = ($valorTemp == 1)?"<li class='item-t-l ativo-l'>Login</li>":(($valorTemp == 0)?"<li class='item-t-l ativo-l'>$item[1]</li>":"<script>alert('Erro no menu');</script>");
        
        $conteudoMenu = "<div id='m-bk'>\n" .
                "<div class='item-p'>\n" .
                "<a href='$link[0]'><img class='item-p-m' src='$imagem'/></a>\n" .
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
                $tempMenuReservaResponsivo.
                "\n <a href='$link[2]'><li class='item-s-lsec $ativo[2]'>$item[2]</li></a>\n" .
                "<a href='$link[3]'><li class='item-s-lsec $ativo[3]'>$item[3]</li></a>\n" .
                "<a href='$link[4]'><li class='item-t-lsec $ativo[4]'>$item[4]</li></a>\n" .
                "</div>" .
                "</div>";
        $conteudoMenu.=$conteudoMenuResponsivo;
        $this->setConteudoMenu($conteudoMenu);
    }

    /*

     * <?php
      session_start();
      class menu {

      private $valAtv = array("", "", "", "", "", "", "");
      public $localLogo = "img/icon/icon.png";
      public $localNome = "img/dm.png";
      public $imgFundoPrinc = "img/Mapo-doufu-1680x1050.jpg";
      private $btLog = "";
      public $btCad = "";

      public function getValAtv($pos) {

      return $this->valAtv[$pos];
      }

      public function setValAtv($valAtv, $pos) {

      $this->valAtv[$pos] = $valAtv;
      }

      function getBtLog() {
      return $this->btLog;
      }

      function setBtLog($btLog) {
      $this->btLog = $btLog;
      }

      function getBtCad() {
      return $this->btCad;
      }

      function setBtCad($btCad) {
      $this->btCad = $btCad;
      }
      function setImgFundoPrinc($imgFundoPrinc) {
      $this->imgFundoPrinc = $imgFundoPrinc;
      }

      function __construct() {
      $valImg = rand(1, 4);
      $this->setImgFundoPrinc("img/slide/".$valImg.".png");
      }

      //
      private function verSessao() {
      $tempAtv = $this->getValAtv(4);
      $tempAtv2 = $this->getValAtv(1);
      $setAtv2 = $this->getValAtv(2);
      //            return header('location:login.php');
      $temp = "<a href='login.php' id='bt-log' class='$tempAtv'>login</a>";
      $crBtCad = "<a href='cad.php'><li class='menu-it $tempAtv2'>Cadastrar</li></a>";
      $crBtPerf = "<a href='perfil.php'><li class='menu-it $temp[1]'>Perfil</li></a>";
      $setAtv2 = $this->getValAtv(2);
      $setBtLogAtv = "<a href='./class/sairsessao.php' id='bt-log' class='$tempAtv'>logout</a>";
      if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      $this->setBtCad($crBtCad);
      $this->setBtLog($temp);
      return 1;
      } elseif ((isset($_SESSION['login']) == true) and ( isset($_SESSION['senha']) == true)) {
      $nomeUser = $_SESSION['nome'];

      echo "<div id ='nome-u'>Bem Vindo $nomeUser</div>";

      $this->setBtCad($crBtPerf);
      $this->setBtLog($setBtLogAtv);
      return 0;
      } else {
      return -1;
      }
      }

      function ativoMenu($valorAtivo) {
      $at = "ativo";


      $imgF = "<img class='img-fundo' src='$this->imgFundoPrinc'/>";

      if ($valorAtivo != 0)
      $imgF = NULL;
      switch ($valorAtivo) {
      case 0:
      $this->setValAtv($at, 0);


      $this->verSessao();
      break;

      case 1:

      $this->setValAtv($at, 1);
      $temp = $this->getValAtv(1);
      $temp2 = "<a href='cad.php'><li class='menu-it $temp'>Cadastrar</li></a>";
      $this->setBtCad($temp2);
      break;


      case 2:

      $this->setValAtv($at, 2);
      $this->verSessao();
      break;

      case 3:

      $this->setValAtv($at, 3);
      $this->verSessao();
      break;

      case 4:

      $this->setValAtv($at, 4);

      //logar
      break;

      case 5:

      $this->setValAtv($at, 5);
      $ValAtv = $this->getValAtv(5);
      $crBtPerf = "<a href='perfil.php'><li class='menu-it $ValAtv'>Perfil</li></a>";
      $this->setBtCad($crBtPerf);
      break;
      case 6:

      break;


      default:
      echo "<script>alert('Erro ao carregar Menu')</script>";
      break;
      }


      $temp = array($this->getValAtv(0), $this->getValAtv(1), $this->getValAtv(2), $this->getValAtv(3));
      $temp2 = $this->getBtCad();
      $btLog = $this->getBtLog();
      echo "
      $imgF
      <div id='fundo-ps' class='degradefixo'>
      <div id='fundo-psf' class='degradem'>
      <img id='img-d' class='img-d' src='$this->localLogo'/>
      <img id='img-dm'class='img-dm' src='$this->localNome'/>

      <div id='menu'>
      $btLog
      <ul>
      <a href='index.php'><li class='menu-it $temp[0]'>Inicio</li></a>
      $temp2
      <a href='menuitem.php'><li class='menu-it $temp[2]'>Menu</li></a>
      <a href='sobre.php'><li class='menu-it $temp[3]'>Sobre</li></a>
      </ul>

      </div>
      </div>"
      . "</div>";
      return;
      }

      }

      ?> */
}
