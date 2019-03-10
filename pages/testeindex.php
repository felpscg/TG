<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>Parking - Controle de Estacionamento</title>
        <!--CSS-->
        <link rel='stylesheet' type='text/css' href='../../css/menu.css'>
        <!--JS--><script charset='utf-8' type='text/javascript' src='../../js/cep.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='../../js/placa.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='../../js/cpf.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='../../js/menu.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js' defer='defer'></script>
    </head>
    <body>
        <div id='m-bk'>
            <div class='item-p'>
                <a href='index.php'><img class='item-p-m' src='../img/parking.png'/><span style='font-size:1.7em'>Parking</span></a>
            </div>
            <div class='item-s'>
                <a href='index.php'><li class='item-s-l ativo' >Inicio</li></a>
                <a href='cadastrar.php'><li class='item-s-l '>Cadastro</li></a>

                <a href='vagas.php'><li class='item-s-l '>Vagas</li></a>
                <a href='sobre.php'><li class='item-s-l '>Sobre</li></a>
            </div>
            <div class='item-t'>
                <li class='item-t-l'>
                    <input type='checkbox' value='0' name='tela-checkbox-d' id='tela-checkbox-d' onclick='telaInteira();'/>
                    <label for='tela-checkbox-d'></label>
                </li>
                <a href='login.php'><li class='item-t-l ativo-l'>Login</li></a>
            </div>
        </div>
        <!-- ------------------------- --><div id='m-bksec'> 
            <div class='item-psec'>
                <a href='index.php'><img class='item-p-msec' src='../img/parking.png'/></a>
            </div>
            <div class='top-checkbox'>
                <input type="checkbox" value="0" name="campo-checkbox" id="campo-checkbox" onclick="exibeItens('item-ssec');"/>
                <label for='campo-checkbox'></label>
                <input type='checkbox' value='0' name='tela-checkbox' id='tela-checkbox' onclick='telaInteira();'/>
                <label for='tela-checkbox'></label>
            </div>
            <div id='item-ssec'>
                <a href='index.php'><li class='item-s-lsec ativo'>Inicio</li></a>
                <a href='cadastrar.php'><li class='item-s-lsec '>Cadastro</li></a>

                <a href='vagas.php'><li class='item-s-lsec '>Vagas</li></a>
                <a href='sobre.php'><li class='item-s-lsec '>Sobre</li></a>
                <a href='login.php'><li class='item-t-lsec '>Login</li></a>
            </div></div>
        <!-- Conteúdo -->
        <style>
            #parte-p, #parte-s, #parte-t{
                position: relative;
                width: 100%;
                height: auto;
                display: block;
                padding-bottom: 3em;
            }
            #parte-p, #parte-t{
                background-color: #b9ffff;
            }
            #parte-s{
                background-color: #ddffff;
            }
            
            .titulo-ini{
                position: relative;
                display: block;
                width: 100%;
                padding: 0.5em;
                font-size: 1.2em;
            } 
            #parte-p .titulo-ini, #parte-t .titulo-ini{
                left: 1em;
                float: left;
            }
            #parte-s .titulo-ini{
                text-align: right;
                float: right;
            }
            .compl-ini{
                position: relative;
                width: 100%;
                left: 0em;
                display: block;
            }
            
            
            
            #parte-p .compl-ini .texto-ini, #parte-t .compl-ini .texto-ini{
                width: 47.5%;

            }
            #parte-p .compl-ini .img-ini, #parte-t .compl-ini .img-ini{
                width: 49.6%;
                float: right;
            }
            
            #parte-s .compl-ini .texto-ini{
                width: 47.5%;
                float: right;
            }
            #parte-s .compl-ini .img-ini{
                width: 49.6%;
                
            }
            
            .texto-ini, .img-ini{
                height: 8em;
                max-height: 8em;
            }
            
            
            .texto-ini{
                text-indent: 1.5em;
                text-align: justify;
            }
/*            #parte-p .compl-ini .img-ini{
                background-image: url('https://homebuyingchecklist.co/wp-content/uploads/2017/10/Parking-lot-security-cameras.jpg');
            }*/
            #parte-p .compl-ini .img-ini{
                background-image: url('../img/rect8492-3.png');
            }
            .compl-ini .img-ini{
                max-width: 100%;
                background-size: 100% auto;
                background-position: 0 center;
            }
            /*-------------*/
            .compl-ini .texto-ini, .compl-ini .img-ini{
                position: relative;
                margin: 0em;
                padding: 0em;
                display: inline-block;
                /*background-color: #08bdff;*/
            }
            .compl-ini .texto-ini{
                margin-left: 1em;
            }
        </style>
        <div id='corpo' >
            <div id='parte-p'>
                <div class='titulo-ini'>Técnologia</div>
                <div class='compl-ini'>
                    <div class='texto-ini'>
                        O sistema de controle de vagas utiliza sensores para retornar o estado da vaga em tempo real.
                        <br>...
                        <br>
                        <br>
                    </div>
                    <div class='img-ini'></div>
                </div>
            </div>
            <div id='parte-s'>
                <div class='titulo-ini'>Vantagens</div>
                <div class='compl-ini'>
                    <div class='texto-ini'>Texto 2</div>
                    <div class='img-ini'>IMG 2</div>
                </div>
            </div>
            <div id='parte-t'>
                <div class='titulo-ini'>Segurança</div>
                <div class='compl-ini'>
                    <div class='texto-ini'>Texto 3</div>
                    <div class='img-ini'>IMG 3</div>
                </div>
            </div>
            <div ></div>
            <div></div>

        </div>
        <!--Ródape-->
        <footer style='position:relative; top:10px; float:bottom;'>
            <p>Outro teste</p>
        </footer>
    </body>
</html>
