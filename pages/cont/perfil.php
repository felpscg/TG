<?php

/**
 * Description of perfil
 *
 * @author felip
 */
class perfil {

    function __construct($registro) {
        if (!isset($registro))
            header('location:./login.php');
//        foreach ($registro as $key => $value) {
//            echo $key . " - >" . $value . "<BR>";
//        }
        echo " <div id = 'corpo' ' >\n"
        . " <div>\n"
        . " <form action = '#' method = 'POST'>\n"
        . " <fieldset>\n"
        . " <legend>Cadastrar</legend>\n"
        . " <fieldset>\n"
        . " <legend>Informações pessoais:</legend>\n"
        . " <div class = 'campo'>\n"
        . " <div class = 'nome-campo'>\n"
        . " <p><span>Nome:*</span></p>\n"
        . " <p><span>CPF:*</span></p>\n"
        . " <p><span>RG:*</span></p>\n"
        . " <p><span>Data de Nascimento:*</span></p>\n"
        . " <p><span>DDD:*</span></p>\n"
        . " <p><span>Telefone/ Celular:*</span></p>\n"
        . " <p><span>Tipo:*</span></p>\n"
        . " <p><span>Local:*</span></p>\n"
        . " </div>\n"
        . " <div class = 'item-campo'>\n"
        . " <p><input type = 'text' name = 'nome'           value='$registro[nome]' /></p>\n"
        . " <p><input type = 'text' name = 'cpf'            value='$registro[cpf]' oninput = 'TestaCPF();'/></p>\n"
        . " <p><input type = 'text' name = 'rg'             value='$registro[rg]' /></p>\n"
        . " <p><input type = 'date' name = 'datanascimento' value='$registro[datanasc]' /></p>\n"
        . " <p><input type = 'text' name = 'ddd'            value='$registro[ddd]' /></p>\n"
        . " <p><input type = 'text' name = 'telefone'       value='$registro[telefone]' /></p>\n"
        . " <p><select name = 'tipotel' id = 'tipotel'' >\n"
        . " <option value = 'celular' select=";
        if ($registro["tipo"] == 'celular')
            echo 'select';
        echo ">Celular</option>\n"
        . " <option value = 'telefone'                      select=";
        if ($registro["tipo"] == 'telefone')
            echo 'select';
        echo ">Telefone</option>\n"
        . " <option value = 'outros'                        select=";
        if ($registro["tipo"] == 'outros')
            echo 'select';
        echo ">Outros</option>\n"
        . "</select></p>"
        . " <p><select name = 'localtel' id = 'localtel'>\n"
        . " <option value = 'principal' disabled = 'disabled'>Selecione</option>\n"
        . " <option value = 'principal' select=";
        if ($registro["local"] == 'principal')
            echo 'select';
        echo ">Principal</option>\n"
        . " <option value = 'residencial' select=";
        if ($registro["local"] == 'residencial')
            echo 'select';
        echo ">Residencial</option>\n"
        . " <option value = 'outros' select=";
        if ($registro["local"] == 'outros')
            echo 'select';
        echo ">Outros</option>\n"
        . "</select></p>"
        . " </div>\n"
        . " </div>\n"
        . " </fieldset>\n"
        . " <fieldset>\n"
        . " <legend>Endereço:</legend>\n"
        . " <div class = 'campo'>\n"
        . " <div class = 'nome-campo'>\n"
        . " <p><span>CEP:*</span></p>\n"
        . " <p><span>Rua:*</span></p>\n"
        . " <p><span>Numero:*</span></p>\n"
        . " <p><span>Complemento:</span></p>\n"
        . " <p><span>Bairro:*</span></p>\n"
        . " <p><span>Cidade:*</span></p>\n"
        . " <p><span>Estado:*</span></p>\n"
        . " </div>\n"
        . " \n"
        . " <div class = 'item-campo'>\n"
        . " <p><input type = 'text' name = 'cep' id = 'cep'                 value='$registro[cep]' maxlength = '30' max = '80' onblur = 'pesquisacep(this.value);'/></p>\n"
        . " <p><input type = 'text' name = 'rua' id = 'rua'                 value='$registro[rua]' maxlength = '30' max = '80'/></p>\n"
        . " <p><input type = 'text' name = 'numero' id = 'numero'           value='$registro[numero]' maxlength = '30' max = '80'/></p>\n"
        . " <p><input type = 'text' name = 'complemento' id = 'complemento' value='$registro[complemento]' maxlength = '30' max = '80'/></p>\n"
        . " <p><input type = 'text' name = 'bairro' id = 'bairro'           value='$registro[bairro]' maxlength = '30' max = '80'/></p>\n"
        . " <p><input type = 'text' name = 'cidade' id = 'cidade'           value='$registro[cidade]' maxlength = '30' max = '80'/></p>\n"
        . " <p><select name = 'estado' id = 'estado'>\n"
        . " <option value = '$registro[estado]' selected = 'selected'>$registro[estado]</option>\n"
        . " <option value = 'AC'>AC</option>\n"
        . " <option value = 'AL'>AL</option>\n"
        . " <option value = 'AM'>AM</option>\n"
        . " <option value = 'AP'>AP</option>\n"
        . " <option value = 'BA'>BA</option>\n"
        . " <option value = 'CE'>CE</option>\n"
        . " <option value = 'DF'>DF</option>\n"
        . " <option value = 'ES'>ES</option>\n"
        . " <option value = 'GO'>GO</option>\n"
        . " <option value = 'MA'>MA</option>\n"
        . " <option value = 'MG'>MG</option>\n"
        . " <option value = 'MS'>MS</option>\n"
        . " <option value = 'MT'>MT</option>\n"
        . " <option value = 'PA'>PA</option>\n"
        . " <option value = 'PB'>PB</option>\n"
        . " <option value = 'PE'>PE</option>\n"
        . " <option value = 'PI'>PI</option>\n"
        . " <option value = 'PR'>PR</option>\n"
        . " <option value = 'RJ'>RJ</option>\n"
        . " <option value = 'RN'>RN</option>\n"
        . " <option value = 'RS'>RS</option>\n"
        . " <option value = 'RO'>RO</option>\n"
        . " <option value = 'RR'>RR</option>\n"
        . " <option value = 'SC'>SC</option>\n"
        . " <option value = 'SE'>SE</option>\n"
        . " <option value = 'SP'>SP</option>\n"
        . " <option value = 'TO'>TO</option>\n"
        . " </select><p>\n"
        . " \n"
        . " </div></div>\n"
        . " </fieldset>\n"
        . " <fieldset>\n"
        . " <legend>Veículo:</legend>\n"
        . " <div class = 'campo'>\n"
        . " <div class = 'nome-campo'>\n"
        . " <p><span>Placa:*</span></p>\n"
        . " <p><span>Ano:</span></p>\n"
        . " <p><span>Cor:</span></p>\n"
        . " <p><span>Marca:</span></p>\n"
        . " <p><span>Modelo:</span></p>\n"
        . " </div>\n"
        . " <div class = 'item-campo'>\n"
        . " <p><input type = 'text' name = 'placa' id = 'placa'     value='$registro[placa]' onblur = 'valida();'/></p>\n"
        . " <p><input type = 'number' name = 'ano'                  value='$registro[ano]'  min = '1950' max = '2019' step = '1'  /></p>\n"
        . " <p><input type = 'text' name = 'cor'                    value='$registro[cor]' /></p>\n"
        . " <p><input type = 'text' name = 'marca'                  value='$registro[marca]' /></p>\n"
        . " <p><input type = 'text' name = 'modelo'                 value='$registro[modelo]' /></p>\n"
        . " </div>\n"
        . " </div>\n"
        . " </fieldset>\n"
        . " <fieldset>\n"
        . " <legend>Habilitação(CNH):</legend>\n"
        . " <div class = 'campo'>\n"
        . " <div class = 'nome-campo'>\n"
        . " <p><span>Número:*</span></p>\n"
        . " </div>\n"
        . " <div class = 'item-campo' style = 'width:70%;'>\n"
        . " <p><input style='margin-left:4em;' type = 'text' name = 'numerohabilitacao' value='$registro[habilitacao]' max = '11' /></p>\n"
        . " \n"
        . " </div>\n"
        . " </div>\n"
        . " </fieldset>\n"
        . " <fieldset>\n"
        . " <legend>Login</legend>\n"
        . " <div class = 'campo'>\n"
        . " <div class = 'nome-campo'>\n"
        . " <p><span>E-mail:*</span></p>\n"
        . " <p><span>Senha:*</span></p>\n"
        . " </div>\n"
        . " <div class = 'item-campo'>\n"
        . " <p><input type = 'email' name = 'email'         value='$registro[email]'/></p>\n"
        . " <p><input type = 'password' name = 'senha' value=''/></p>\n"
        . " </div>\n"
        . " </div>\n"
        . " </fieldset>\n"
        . " \n"
        . "<input type='hidden' name='est' value='alt'/>"
        . " <input type = 'button' value = 'Alterar' onclick = 'submit();'>\n"
        . " <input type = 'button' value = 'Deletar' onclick = 'deletar();'>\n"
        . " </fieldset>\n"
        . " </form>\n"
        . " </div>\n"
        . " </div>";
    }

}
