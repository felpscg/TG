<?php

/**
 * Description of falha
 *
 * @author Felipe Corrêa Gomes
 * Criado em 29/12/2018
 */
class falha {
    public $problema = array();

    private function getProblema($posicao) {
        return $this->problema[$posicao];
    }

    private function setProblema($problema, $posicao) {
        $this->problema[$posicao] = $problema;
    }

    public function controlarOp($op) {
        if ($op) {
            if ($op <= 4) {
                $this->gerenciarConexao($op);
            }
//            else if($op>5 && $op<6){
//                
//            }
        } else {
            $this->excecao();
        }
    }

    public function gerenciarConexao($op) {
        $problema = "";
        switch ($op) {
            case 1:
//                Erro de conexao
                echo $problema = "Erro de conexão com o Banco de Dados <BR>"
                . "Verifique as credenciais de acesso";
                break;
            case 2:
//                Erro para Inserir
                echo $problema = "Erro tal";
                break;
            case 3:
//                Erro ao Deletar
                echo $problema = "Erro tal";
                break;

            default:
                $this->excecao();
                break;
        }


        $this->setProblema($problema, 0);
        return;
    }

    public function gerenciarCliente() {
        $problema = "Erro Tal";
        $this->setProblema($problema, 1);
        return;
    }

    public function gerenciarVaga() {
        $problema = "Erro Tal";
        $this->setProblema($problema, 2);
        return;
    }

    public function excecao() {
        echo $problema = "Erro interno";
        //$this->setProblema($problema, 4);
        return;
    }

//    function exibirOp() {
//        echo $this->gerenciarConexao();
//        echo $this->gerenciarCliente();
//        echo $this->gerenciarVaga();
//    }
}
