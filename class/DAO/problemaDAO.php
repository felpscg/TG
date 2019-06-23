<?php

class problemaDAO {
    function __construct($op = 0, $con = null, $ext = '') {
        if ($con === null) {
            exit(0);
        }
        switch ($op) {
            case 1:
                $this->incluirProblema($con);
                break;

            case 2:
                $this->consultarProblema($con);
                break;

            default:
                echo 'Ação não encontrada';
                break;
        }
    }
    function incluirProblema($con) {
        session_start();
        $linkBD = $con;
        $dadosProblema = $_POST;
        $login = $_SESSION["login"];
        $queryLoginID = "SELECT usuarios.pkusuario FROM usuarios WHERE usuarios.cpf = '$login' OR usuarios.email = '$login';";
        $ResultResDia = mysqli_fetch_assoc(mysqli_query($linkBD, $queryLoginID));
        
        
        $queryProblema = "INSERT INTO `tg`.`problemas` (`assunto`, `descricao`, `fkusuario`) VALUES ('$dadosProblema[assunto]', '$dadosProblema[descricao]', '$ResultResDia[pkusuario]');";
        mysqli_query($linkBD, $queryProblema);
        echo "<div style='position:fixed; top:20em; left:5em; z-index:1000;'>"
        . "<p>Problema incluido com sucesso</p>"
                . "<p style='margin-top:-2em; margin-left:5em; '><a href='index.php'><input type='button' value='Início'/></a></p>"
                . "</div>";
        session_abort();
    }
}
