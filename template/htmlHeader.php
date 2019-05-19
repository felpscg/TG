<?php

/**
 * Description of htmlHeader
 *
 * @author Felipe
 */
class htmlHeader {

    private $caminhoJS = '';
    private $caminhoCSS = '';
    private $caminhoBasicoCSS = "<link rel='stylesheet' type='text/css' href='../../css/menu.css'>\n";
    private $caminhoBasicoJS = "<script charset='utf-8' type='text/javascript' src='../../js/cep.js' defer='defer'></script>\n"
            . "<script charset='utf-8' type='text/javascript' src='../../js/placa.js' defer='defer'></script>\n"
            . "<script charset='utf-8' type='text/javascript' src='../../js/cpf.js' defer='defer'></script>\n"
            . "<script charset='utf-8' type='text/javascript' src='../../js/menu.js' defer='defer'></script>\n"
            . "<script charset='utf-8' type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js' defer='defer'></script>\n";

    function getCaminhoJS() {
        return $this->caminhoJS;
    }

    function getCaminhoCSS() {
        return $this->caminhoCSS;
    }

    function setCaminhoJS($caminhoJS) {
        $this->caminhoJS = $caminhoJS;
    }

    function setCaminhoCSS($caminhoCSS) {
        $this->caminhoCSS = $caminhoCSS;
    }

    function getCaminhoBasicoCSS() {
        return $this->caminhoBasicoCSS;
    }

    function getCaminhoBasicoJS() {
        return $this->caminhoBasicoJS;
    }

    function __construct($op = '', $cJS = '', $cCSS = '') {
        switch ($op) {

//            Carrega o caminho Básico do CSS e do JS
            case '':
                $this->headInicial();
                break;

//            Carrega o caminho Básico do CSS e do JS adicionando novos estilos
            case 1:

                $this->setCaminhoCSS($cCSS);
                $this->headInicial();
                break;

//            Carrega o caminho Básico do CSS e do JS adicionando novas funcoes JS
            case 2:

                break;

//            Altera o caminho basico do CSS e utiliza o caminho basico do JS
            case 3:

                break;
//            Altera o caminho basico do JS e utiliza o caminho basico do CSS
            case 4:

                break;

//            Nao utiuliza caminho algum 
            case 5:

                break;

            default:
                echo 'Erro';
                exit(0);
                break;
        }
    }

    function headInicial() {
//        $root = $_SERVER['DOCUMENT_ROOT'];
        echo "<html>\n" .
        "<head>\n" .
        "<meta charset='UTF-8'>\n" .
        "<link rel='shortcut icon' href='../img/parking-ib.png'>" .
        "<title>Parking - Controle de Estacionamento</title>\n" .
        "<!--CSS-->\n"
        . $this->getCaminhoBasicoCSS()
        . $this->getCaminhoCSS()
        . "<!--JS-->"
        . $this->getCaminhoBasicoJS()
        . $this->getCaminhoJS()
        . "</head>\n" .
        "<body>\n";
    }

}
