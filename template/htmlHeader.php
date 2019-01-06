<?php

/**
 * Description of htmlHeader
 *
 * @author Felipe
 */
class htmlHeader {

    function __construct() {
        echo "<html>\n" .
        "<head>\n" .
        "<meta charset='UTF-8'>\n" .
        "<title>TODO supply a title</title>\n" .
        "<!--CSS-->\n" .
        "<link rel='stylesheet' type='text/css' href='../../css/menu.css'>\n"
        . "<!--JS-->"
        . "<script charset='utf-8' type='text/javascript' src='../../js/cep.js' defer='defer'></script>\n"
        . "<script charset='utf-8' type='text/javascript' src='../../js/placa.js' defer='defer'></script>\n"
        . "" .
        "<script charset='utf-8' type='text/javascript' src='../../js/menu.js' defer='defer'></script>\n" .
        "<script charset='utf-8' type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js' defer='defer'></script>\n" .
        "</head>\n" .
        "<body>\n";
    }

}
