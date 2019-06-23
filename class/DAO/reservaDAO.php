<?php

class reservaDAO {

    function __construct($op = 0, $con = null, $ext = '') {
        if ($con === null) {
            exit(0);
        }
        switch ($op) {
            case 1:
                $this->incluirFim($con);
                break;

            case 2:
                $this->excluirReserva($con);
                break;

            default:
                echo 'Ação não encontrada';
                break;
        }
    }

    function incluirReserva($con) {
        session_start();
        $dadosReserva = $_POST;

        $res = $dadosReserva;
        foreach ($res as $key => $value) {
            echo 'Var - ' . $key;
            echo ' -- Value - ' . $value . '<br>';
        }

        $login = $_SESSION["login"];
        $values = array();
        if (!($this->validaUnico($login, 'fkusuario', $con))) {
            echo 'Ja existe uma reserva para esse usuário';
        }//Verifica se ja foi efetuado Reserva no mesmo ID


        if (!($this->validaUnico($res['v-radio'], 'fkvaga', $con))) {
            echo 'Vaga preenchida por outro usuário';
            exit(0);
        }//Verifica se ja foi feito reserva da vaga coincidente com o horário

        $idEndereco = $this->inserirEndereco($dadosReserva, $con);

        $campoRg = '';
        $rg = '';

        if (isset($usr['rg']) && $usr['rg'] != "") {
            $rg = "'$usr[rg]', ";
            $campoRg = "`rg`, ";
        }
        $senha = md5($usr['senha']);
        $query = "INSERT INTO `tg`.`Reservas` (`nome`, `cpf`, $campoRg`datanasc`, `email`, `senha`, `habilitacao`, `fktelefone`, `fkendereco`, `fkveiculo`) VALUES ('$usr[nome]', '$usr[cpf]', $rg '$usr[datanascimento]', '$usr[email]', '$senha', '$usr[numerohabilitacao]', '$idTelefone', '$idEndereco', '$idCarro');";

//        $query = "INSERT INTO `tg`.`enderecos` (`cep`, `rua`, `numero`, $campoCompl `bairro`, `cidade`, `estado`) VALUES ('$end[cep]', '$end[rua]', '$end[numero]',$complemento '$end[bairro]', '$end[cidade]', '$end[estado]');";
//        echo $query;
        mysqli_query($con, $query) or die("Erro ao inserir Reserva");
        unset($usr, $dadosReserva);
        echo mysqli_insert_id($con);
        sesiion_abort();
    }

    public function validaUnico($dadosCampo, $campo, $con) {

        // Vaga, Reserva
        switch ($campo) {
            case "fkvaga":
                //      Valida vaga com horário de outra reserva na mesma vaga
                $vaga = $dadosCampo;
                $login = $_SESSION["login"];
                echo $query = "SELECT * FROM reservas WHERE reservas.dataentrada = '$_POST[diames]' "
                . "AND NOT reservas.fkusuario = ("
                . "SELECT usuarios.pkusuario FROM usuarios WHERE "
                . "usuarios.cpf = '$login' OR usuarios.email = '$login') "
                . "AND '$_POST[hrentrada]:00' BETWEEN reservas.hrentrada AND reservas.hrsaida "
                . "AND reservas.fkvaga = $vaga;";
                exit(0);
//                --------------------
                $query = "SELECT `pkusuario` FROM `tg`.`usuarios` WHERE `email` = '$dadosCampo' OR `cpf` = '$dadosCampo';";

                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    $registro = mysqli_fetch_array($result);
                    $_SESSION['id'] = $registro['pkusuario'];
                    echo $_SESSION['id'];
                    $queryRes = "SELECT * FROM `tg`.`reservas` where `fkusuario` = '$_SESSION[id]';";
                    $resultRes = mysqli_query($con, $queryRes);
                    if (mysqli_num_rows($resultRes) > 0) {
                        
                    }
                }
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    return false;
                } else {
                    return true;
                }
                break;

            case "fkusuario":
                $query = "SELECT `pkusuario` FROM `tg`.`usuarios` WHERE `email` = '$dadosCampo' OR `cpf` = '$dadosCampo';";

                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    $registro = mysqli_fetch_array($result);
                    $_SESSION['id'] = $registro['pkusuario'];
                    echo $_SESSION['id'];
                    $queryRes = "SELECT * FROM `tg`.`reservas` where `fkusuario` = '$_SESSION[id]';";
                    $resultRes = mysqli_query($con, $queryRes);
                    if (mysqli_num_rows($resultRes) > 0) {
                        $registroRes = mysqli_fetch_array($resultRes);
                        foreach ($registroRes as $key => $value) {
                            echo ' <br>' . $key . ' -> ' . $value . ' <br>';
                        }
                    }
                    return false;
                } else {
                    return true;
                }
                break;

            default:
                echo 'Erro interno - Recarregue a página.';
                exit(0);
                break;
        }
    }

//      Valida Reserva com o mesmo usuário



    function incluirFim($con) {
        session_start();
        $dadosReserva = $_POST;

        $res = $dadosReserva;
//        foreach ($res as $key => $value) {
//            echo 'Var - ' . $key;
//            echo ' -- Value - ' . $value . '<br>';
//        }

        $login = $_SESSION["login"];
        $vaga = $res["v-radio"];
        $queryLogin = "SELECT usuarios.pkusuario FROM usuarios WHERE usuarios.cpf = '$login' OR usuarios.email = '$login';";
        $registro = mysqli_fetch_assoc(mysqli_query($con, $queryLogin));
        $queryVerifica = "SELECT reservas.pkreserva, reservas.fkvaga FROM reservas WHERE reservas.fkusuario = '$registro[pkusuario]';";
//        echo $queryVerifica;
//        exit();
        $resultVerifica = mysqli_query($con, $queryVerifica);
        $resultVerificaReg = mysqli_fetch_assoc(mysqli_query($con, $queryVerifica));
        echo $resultVerificaReg["pkreserva"];
//        exit(0);
        $query = "";
        $queryt = "";
        $vagaANT= $resultVerificaReg["fkvaga"];
        if (isset($resultVerificaReg["pkreserva"])) {
            $query = "UPDATE `tg`.`reservas` SET `hrentrada`='$res[hrentrada]:00', `hrsaida`='$res[hrsaida]:00', `dataentrada`='$res[diames]:00', `fkvaga`='$vaga' WHERE reservas.fkusuario = $registro[pkusuario]; ";
            $queryt=" UPDATE `tg`.`vagas` SET `vagas`.`estadovaga`='1' WHERE `vagas`.numerovaga='$vaga'";
            $queryq=" UPDATE `tg`.`vagas` SET `vagas`.`estadovaga`='0' WHERE `vagas`.numerovaga='$vagaANT'";
            mysqli_query($con, $queryq);
//            echo $query;
//            exit(0);
            
        } else {
            $query = "INSERT INTO `tg`.`reservas` (`hrentrada`, `hrsaida`, `dataentrada`, `fkvaga`, `fkusuario`) VALUES ('$res[hrentrada]:00', '$res[hrsaida]:00', '$res[diames]', '$vaga', '$registro[pkusuario]');";
            $queryt=" UPDATE vagas SET `vagas`.estadovaga='1' WHERE `vagas`.numerovaga='$vaga'";
            
        }
//        echo $query;
//        exit();
        mysqli_query($con, $query);
        mysqli_query($con, $queryt);
        header('location:./reserva.php');
        session_abort();
    }

}
