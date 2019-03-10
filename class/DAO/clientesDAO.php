<?php

/**
 * @author Felipe Corrêa Gomes
 * Criado em 03/02/2019
 */
// Usuario == cliente
// classe cliente / Função Usuario = BD

class clientesDAO {

    function __construct($op = 0, $con = null) {
        if ($con === null) {
            exit(0);
        }
        switch ($op) {
            case 1:
                $this->incluirUsuario($con);
                exit(0);
                break;

            case 2:
                $this->alterarUsuario($con);
                exit(0);
                break;
            case 3:
                $this->consultarUsuario($con);
                exit(0);
                break;

            case 4:
                $this->excluirUsuario($con);
                exit(0);
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
        foreach ($_POST as $key => $value) {
            echo $key . ' - > ' . $value . '<br>';
        }
    }

    function excluirUsuario($con) {
        foreach ($_POST as $key => $value) {
            echo $key . ' - > ' . $value . '<br>';
        }
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
// -----------------Fim-Valida------------------ \\
}
