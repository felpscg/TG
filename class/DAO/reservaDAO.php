<?php

class reservaDAO {

    function __construct($op = 0, $con = null, $ext = '') {
        if ($con === null) {
            exit(0);
        }
        switch ($op) {
            case 1:
                $this->incluirReserva($con);
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
            
        }

        
        if (!($this->validaUnico($res['v-radio'], 'fkvaga', $con))) {
            echo 'Vaga preenchida por outro usuário';
            exit(0);
        }
        exit(0);
        if (!($this->validaUnico($usr['v-radio'], 'fkvaga', $con))) {
            echo 'Vaga preenchida por outro usuário';
            exit(0);
        }

        $idEndereco = $this->inserirEndereco($dadosReserva, $con);
        $idTelefone = $this->inserirTelefone($dadosReserva, $con);
        $idCarro = $this->inserirVeiculo($dadosReserva, $con);

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
                $vaga = $_POST["v-radio"];
                echo $query = "SELECT `fkvaga` FROM `tg`.`reservas` WHERE reservas.fkvaga = '$vaga' AND NOT reservas.fkusuario = '3';";
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
            case "fkreserva":
                $query = "SELECT `pkusuario` FROM `tg`.`reservas` WHERE `fkvaga` = '$dadosCampo';";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {

//                    
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
            case "hrentrada":
                echo $_POST['diames'];
                exit(0);
                $query = "SELECT * FROM reservas WHERE '$dadosCampo' BETWEEN reservas.hrentrada AND reservas.hrsaida AND reservas.dataentrada = '2019-06-15'";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    return false;
                } else {
                    return true;
                }

                break;
            default:
                break;
        }
    }

//      Valida Reserva com o mesmo usuário
}
