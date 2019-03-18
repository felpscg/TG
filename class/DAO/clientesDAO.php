<?php

/**
 * @author Felipe Corrêa Gomes
 * Criado em 03/02/2019
 */
// Usuario == cliente
// classe cliente / Função Usuario = BD

class clientesDAO {

    function __construct($op = 0, $con = null, $ext = '') {
        if ($con === null) {
            exit(0);
        }
        switch ($op) {
            case 1:
                $this->incluirUsuario($con);
//                exit(0);
                break;

            case 2:
                $this->alterarUsuario($con);
                exit(0);
                break;
            case 3:
                $this->consultarUsuario($con);

                break;

            case 4:
                $this->excluirUsuario($con);

                break;

            case 5:
                $this->validaUsuario($ext, $con);
                break;

            default:
//                Erro ao encontrar função
                echo '';

                break;
        }
    }

// -----------------Usuário\/Cliente------------------ \\

    function incluirUsuario($con) {
        $dadosUsuario = $_POST;
        $usr = $dadosUsuario;
        if (!($this->validaUnico($usr['cpf'], 'cpf', $con))) {
            echo 'CPF ja cadastrado';
            exit(0);
        }
        if (!($this->validaUnico($usr['email'], 'email', $con))) {
            echo 'E-mail ja cadastrado';
            exit(0);
        }
//        echo $_POST['cidade'];
//        foreach ($_POST as $key => $value) {
//          echo $key." -> ".$value."<br>";  
//        }
//        cep ->
//rua ->
//numero ->
//complemento ->
//bairro ->
//cidade -> 
//        
//            Validar campos;
//            Inserir Telefone
//            Inserir Endereco
//            Inserir Carro
//            Inserir Usuário
        $idEndereco = $this->inserirEndereco($dadosUsuario, $con);
        $idTelefone = $this->inserirTelefone($dadosUsuario, $con);
        $idCarro = $this->inserirVeiculo($dadosUsuario, $con);

        $campoRg = '';
        $rg = '';

        if (isset($usr['rg']) && $usr['rg'] != "") {
            $rg = "'$usr[rg]', ";
            $campoRg = "`rg`, ";
        }
        $senha = md5($usr['senha']);
        $query = "INSERT INTO `tg`.`usuarios` (`nome`, `cpf`, $campoRg`datanasc`, `email`, `senha`, `habilitacao`, `fktelefone`, `fkendereco`, `fkveiculo`) VALUES ('$usr[nome]', '$usr[cpf]', $rg '$usr[datanascimento]', '$usr[email]', '$senha', '$usr[numerohabilitacao]', '$idTelefone', '$idEndereco', '$idCarro');";

//        $query = "INSERT INTO `tg`.`enderecos` (`cep`, `rua`, `numero`, $campoCompl `bairro`, `cidade`, `estado`) VALUES ('$end[cep]', '$end[rua]', '$end[numero]',$complemento '$end[bairro]', '$end[cidade]', '$end[estado]');";
//        echo $query;
        mysqli_query($con, $query) or die("Erro ao inserir Usuario");
        unset($usr, $dadosUsuario);
        echo mysqli_insert_id($con);
    }

    function alterarUsuario($con) {
        foreach ($_POST as $key => $value) {
            echo $key . ' - > ' . $value . '<br>';
        }
    }

    function consultarUsuario($con) {
        $login = $_SESSION["login"];
        $senha = $_SESSION["senhamd5"];
        $tipo = "cpf";
        if (!($this->validaUnico($login, 'cpf', $con)) || !($this->validaUnico($login, 'email', $con))) {
            if ((preg_match("/@/", $login)) == true) {
                $tipo = "email";
            }
            $query = "SELECT `usuarios`.`pkusuario` FROM `tg`.`usuarios` WHERE `tg`.`usuarios`.$tipo = '$login' AND `tg`.`usuarios`.senha = '$senha'";
            $resultTemp = mysqli_query($con, $query) or die("Erro ao verificar Login e Senha");
            $registro = mysqli_fetch_assoc($resultTemp);
            $pkUsuario = $registro["pkusuario"];
            $queryTemp = "SELECT * FROM "
                    . "(SELECT * FROM `tg`.enderecos WHERE `tg`.enderecos.pkendereco = "
                    . "(SELECT `tg`.usuarios.fkendereco FROM `tg`.usuarios WHERE `tg`.usuarios.pkusuario = $pkUsuario)) AS ENDERECO,"
                    . "(SELECT * FROM `tg`.telefones WHERE `tg`.telefones.pktelefone = "
                    . "(SELECT `tg`.usuarios.fktelefone FROM `tg`.usuarios WHERE `tg`.usuarios.pkusuario = $pkUsuario)) AS TELEFONE,"
                    . "(SELECT * FROM `tg`.veiculos WHERE `tg`.veiculos.pkveiculo = "
                    . "(SELECT `tg`.usuarios.fkveiculo FROM `tg`.usuarios WHERE `tg`.usuarios.pkusuario = $pkUsuario)) AS VEICULO, "
                    . "(SELECT * FROM `tg`.usuarios WHERE `tg`.usuarios.pkusuario = $pkUsuario ) AS USUARIO;";
            $resultRegistro = mysqli_query($con, $queryTemp) or die("Erro ao verificar");
            if (mysqli_num_rows($resultRegistro) == 1) {
                return $registro = mysqli_fetch_assoc($resultRegistro);
            } else {
                echo "Erro ao consultar usuário";
                exit(0);
            }
        }
    }

    function excluirUsuario($con) {
        
    }

// -----------------Fim-Usuário\/Cliente------------------ \\
// -----------------Endereco------------------ \\
    function inserirEndereco($dadosEndereco, $con) {
        $end = $dadosEndereco;
        $campoCompl = '';
        $complemento = '';
        if (isset($end['complemento']) && $end['complemento'] != "") {
            $complemento = "'$end[complemento]', ";
            $campoCompl = "`complemento`, ";
        }
        $query = "INSERT INTO `tg`.`enderecos` (`cep`, `rua`, `numero`, $campoCompl `bairro`, `cidade`, `estado`) VALUES ('$end[cep]', '$end[rua]', '$end[numero]',$complemento '$end[bairro]', '$end[cidade]', '$end[estado]');";
//        echo $query;
        mysqli_query($con, $query) or die("Erro ao inserir endereço");
        unset($end, $dadosEndereco);
        return mysqli_insert_id($con);
    }

// -----------------Fim-Endereco------------------ \\
// -----------------Telefone------------------ \\
    function inserirTelefone($dadosTelefone, $con) {
        $tel = $dadosTelefone;
        $campoLocal = '';
        $local = '';

        if (isset($tel['localtel']) && $tel['localtel'] != "") {
            $local = ", '$tel[localtel]'";
            $campoLocal = ", `local`";
        }

        $query = "INSERT INTO `tg`.`telefones` (`ddd`, `telefone`, `tipo`$campoLocal) VALUES ('$tel[ddd]', '$tel[telefone]', '$tel[tipotel]'$local);";
//        echo $query;
        mysqli_query($con, $query) or die("Erro ao inserir Telefone");
        unset($tel, $dadosTelefone);
        return mysqli_insert_id($con);
    }

// -----------------Fim-Telefone------------------ \\
// -----------------Veiculo------------------ \\
    function inserirVeiculo($dadosCarro, $con) {

        $car = $dadosCarro;
        $campoAno = '';
        $campoCor = '';
        $campoMarca = '';
        $campoModelo = '';
        $ano = '';
        $cor = '';
        $marca = '';
        $modelo = '';
        if (!($this->validaUnico($car['placa'], 'placa', $con))) {
            echo 'Placa ja cadastrada';
            exit(0);
        }
        if (isset($car['ano']) && $car['ano'] != "") {
            $ano = ", '$car[ano]'";
            $campoAno = ", `ano`";
        }
        if (isset($car['cor']) && $car['cor'] != "") {
            $cor = ", '$car[cor]'";
            $campoCor = ", `cor`";
        }
        if (isset($car['marca']) && $car['marca'] != "") {
            $marca = ", '$car[marca]'";
            $campoMarca = ", `marca`";
        }
        if (isset($car['modelo']) && $car['modelo'] != "") {
            $modelo = ", '$car[modelo]'";
            $campoModelo = ", `modelo`";
        }


        $query = "INSERT INTO `tg`.`veiculos` (`placa`$campoAno $campoCor $campoMarca $campoModelo) VALUES ('$car[placa]' $ano  $cor $marca $modelo);";
//        echo $query;
        mysqli_query($con, $query) or die("Erro teste");
        unset($car, $dadosCarro);
        return mysqli_insert_id($con);
    }

// -----------------Fim-Veiculo------------------ \\
// -----------------Valida------------------ \\
//
    public function validaUnico($dadosCampo, $campo, $con) {
        switch ($campo) {
            case "cpf":
                $query = "SELECT `cpf` FROM `tg`.`usuarios` where `cpf` = '$dadosCampo';";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    return false;
                } else {
                    return true;
                }
                break;
            case "email":
                $query = "SELECT `email` FROM `tg`.`usuarios` where `email` = '$dadosCampo';";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    return false;
                } else {
                    return true;
                }

                break;
            case "placa":
                $query = "SELECT `placa` FROM `tg`.`veiculos` where `placa` = '$dadosCampo';";
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

//CPF
//EMAIL
//PLACA
//
//
//
//
    function validaUsuario($ext, $con) {
        $login = $_SESSION["login"];
        $senha = $_SESSION["senhamd5"];
        $tipo = "cpf";
        if (!($this->validaUnico($login, 'cpf', $con)) || !($this->validaUnico($login, 'email', $con))) {
            if ((preg_match("/@/", $login)) == true) {
                $tipo = "email";
            }
            $query = "SELECT * FROM `tg`.`usuarios` WHERE `tg`.`usuarios`.$tipo = '$login' AND `tg`.`usuarios`.senha = '$senha'";
            $result = mysqli_query($con, $query) or die("Erro ao verificar Login e Senha");
            if (mysqli_num_rows($result) == 1) {
                $registro = mysqli_fetch_assoc($result);

                header('location:../perfil.php');
            } else {
                unset($_SESSION['login']);
                unset($_SESSION['nome']);
                unset($_SESSION['senha']);
                echo"<script>"
                . "alert('Login ou Senha incorretos');"
                . "history.go(-1);"
                . "</script>";
            }
            exit(0);
        } else {
            echo 'Usuário não encontrado';
        }

//        
//        $query = "INSERT INTO `tg`.`usuarios` (`nome`, `cpf`, $campoRg`datanasc`, `email`, `senha`, `habilitacao`, `fktelefone`, `fkendereco`, `fkveiculo`) VALUES ('$usr[nome]', '$usr[cpf]', $rg '$usr[datanascimento]', '$usr[email]', '$senha', '$usr[numerohabilitacao]', '$idTelefone', '$idEndereco', '$idCarro');";
//
////        $query = "INSERT INTO `tg`.`enderecos` (`cep`, `rua`, `numero`, $campoCompl `bairro`, `cidade`, `estado`) VALUES ('$end[cep]', '$end[rua]', '$end[numero]',$complemento '$end[bairro]', '$end[cidade]', '$end[estado]');";
////        echo $query;
//        mysqli_query($con, $query) or die("Erro ao inserir Usuario");
//        unset($usr, $dadosUsuario);
//        echo mysqli_insert_id($con);
    }

//LOGIN-USUARIO
// -----------------Fim-Valida------------------ \\
}
