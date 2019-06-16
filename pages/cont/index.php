<?php

class index {

    public function __construct() {
        $bt = '';
        session_start();
        if ((!isset($_SESSION['login'])) and ( !isset($_SESSION['senha']))) {
            $bt = " <div id='cadpagp'><span>Cadastrar</span></div>"
                    . " <div id='logpagp'><span>Conectar</span></div>";
        }
        else{
            $bt = " <a href='logout.php'><div id='cadpagp' style='left:2.9em;'><span>Sair</span></div></a>";
        }
        echo "<div id='corpo'>" .
        "<div id='corpo-p'>"
        . "<div id='corpo-pp'><img id='imgpgini' src='../img/estacionamento3.jpg'/></div>"
        . "<div id='corpo-ps'>"
        . $bt
        . "</div>"
        . "</div>" .
        "</div>";
    }

}
