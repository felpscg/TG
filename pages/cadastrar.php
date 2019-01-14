<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/class/menuPrincipal.php';
require_once './cont/cadastrar.php';
$header = new htmlHeader();
$menu = new menuPrincipal(1);
?>

<!-- Conteúdo -->

<?php
$conteudo = new cadastrar();
?>
<!--<div id='corpo' >
    <div>
        <fieldset>
            <legend>Cadastrar</legend>
            <fieldset>
                <legend>Informações pessoais:</legend>
                <div class='campo'>
                    <div class='nome-campo'>
                        <p><span>Nome:*</span></p>
                        <p><span>CPF:*</span></p>
                        <p><span>RG:*</span></p>
                        <p><span>Data de Nascimento:*</span></p>
                        <p><span>Telefone/ Celular:*</span></p>
                        <p><span>Telefone/ Celular:</span></p>
                    </div>
                    <div class='item-campo'>
                        <p><input type='text' name='nome' /></p>
                        <p><input type='text' name='cpf' /></p>
                        <p><input type='text' name='nome' /></p>
                        <p><input type='date' name='datanascimento'/></p>
                        <p><input type='text' name='telefone'/></p>
                        <p><input type='text' name='telefone' /></p>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Endereço:</legend>
                <div class='campo'>
                    <div class='nome-campo'>
                        <p><span>CEP:*</span></p>
                        <p><span>Rua:*</span></p>
                        <p><span>Numero:*</span></p>
                        <p><span>Complemento:</span></p>
                        <p><span>Bairro:*</span></p>
                        <p><span>Cidade:*</span></p>
                        <p><span>Estado:*</span></p>
                    </div>
                    
                    <div class='item-campo'>
                        <p><input type='text' name='cep' id='cep' maxlength="30" max="80" onblur="pesquisacep(this.value);"/></p>
                        <p><input type='text' name='rua' id='rua' maxlength="30" max="80"/></p>
                        <p><input type='text' name='numero' id='numero' maxlength="30" max="80"/></p>
                        <p><input type='text' name='complemento' id='complemento' maxlength="30" max="80"/></p>
                        <p><input type='text' name='bairro' id='bairro' maxlength="30" max="80"/></p>
                        <p><input type='text' name='cidade' id='cidade' maxlength="30" max="80"/></p>
                        <p><select name='estado' id='estado' >
                            <option value='' disabled='disabled' selected='selected'>Selecione</option>
                            <option value='AC'>AC</option>
                            <option value='AL'>AL</option>
                            <option value='AM'>AM</option>
                            <option value='AP'>AP</option>
                            <option value='BA'>BA</option>
                            <option value='CE'>CE</option>
                            <option value='DF'>DF</option>
                            <option value='ES'>ES</option>
                            <option value='GO'>GO</option>
                            <option value='MA'>MA</option>
                            <option value='MG'>MG</option>
                            <option value='MS'>MS</option>
                            <option value='MT'>MT</option>
                            <option value='PA'>PA</option>
                            <option value='PB'>PB</option>
                            <option value='PE'>PE</option>
                            <option value='PI'>PI</option>
                            <option value='PR'>PR</option>
                            <option value='RJ'>RJ</option>
                            <option value='RN'>RN</option>
                            <option value='RS'>RS</option>
                            <option value='RO'>RO</option>
                            <option value='RR'>RR</option>
                            <option value='SC'>SC</option>
                            <option value='SE'>SE</option>
                            <option value='SP'>SP</option>
                            <option value='TO'>TO</option>
                            </select><p>

                        
                    </div></div>
            </fieldset>
            <fieldset>
                <legend>Veículo:</legend>
                <div class='campo'>
                    <div class='nome-campo'>
                        <p><span>Placa:*</span></p>
                        <p><span>Ano:</span></p>
                        <p><span>Cor:</span></p>
                        <p><span>Marca:</span></p>
                        <p><span>Modelo:</span></p>
                    </div>
                    <div class='item-campo'>
                        <p><input type='text' name='placa' id='placa' onblur="valida();"/></p>
                        <p><input type='text' name='ano' /></p>
                        <p><input type='text' name='cor' /></p>
                        <p><input type='date' name='marca'/></p>
                        <p><input type='text' name='modelo'/></p>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Habilitação</legend>
                <div class='campo'>
                    <div class='nome-campo'>
                        <p><span>Número:*</span></p>
                        <p><span>Categoria:*</span></p>
                    </div>
                    <div class='item-campo'>
                        <p><input type='text' name='numerohabilitacao' /></p>
                        <p><input type='text' name='categoria' /></p>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Login</legend>
                <div class='campo'>
                    <div class='nome-campo'>
                        <p><span>E-mail:*</span></p>
                        <p><span>Senha:*</span></p>
                    </div>
                    <div class='item-campo'>
                        <p><input type='text' name='email' /></p>
                        <p><input type='text' name='senha' /></p>
                    </div>
                </div>
            </fieldset>

        </fieldset>
    </div>
</div>-->
<!--Ródape-->
<?php
$rodape = new htmlFooter();
?>
