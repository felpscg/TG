<!--MINHA RESERVA-->
<html>
    <head>
        <meta charset='UTF-8'>
        <title>Parking - Controle de Estacionamento</title>
        <!--CSS-->
        <link rel='stylesheet' type='text/css' href='../css/menu.css'>
        <!--JS--><script charset='utf-8' type='text/javascript' src='../js/cep.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='../js/placa.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='../js/cpf.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='../js/menu.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js' defer='defer'></script>
        <style>
            @import url('../css/font.css');
            body{
                width: 1358px !important;
                font-family: aegean;
            }

            #legenda{
                position: relative;
                margin-top: 2em;
                top:0em;
                width: 100%;
                left: 10%;
                /*border: solid 1px #000;*/
            }

            .legenda{
                position: relative;
                display: inline-block;
            }

            .livre{
                background-image: url('../img/livre.png');
                background-repeat: no-repeat;
            }

            .reservado{
                background-image: url('../img/reservado.png');
                background-repeat: no-repeat;
            }

            .ocupado{
                background-image: url('../img/ocupado.png');
                background-repeat: no-repeat;
            }

            .m-reserva{
                background-image: url('../img/minhareserva.png');
                background-repeat: no-repeat;
            }

            .livre, .ocupado, .reservado, .m-reserva{
                margin-top: 0em;
                margin-left: 1em;
                top: 0em;
                vertical-align: top;
                position: relative;
                display: inline-table;
                width: 15%;
                min-height: 80px;
                height: 90px;
                background-repeat: no-repeat;
                background-size: 100% auto;
            }

            .legenda span{
                position:relative;
                width: 80%;
                margin-left: -30%; 
                left:40%;
                bottom:1.5em;
                color:#000;
                font-size: 0.8em;
            }

            #problema{
                position: fixed;
                bottom: 5%;
                right: 5%;
                margin: 13.8px 4px 8px 6px !important;
                padding: 0px 12px 0px 10px;
                border-top: 3px solid #08bdff;
                border-bottom: 3px solid #08bdff;
                background-color: #0089bb;
                color:#fff;
                z-index:777;
                cursor:pointer;
            }

            #problema:hover{
                margin: 13.8px 4px 8px 6px !important;
                padding: 0px 12px 0px 10px;
                border-top: 3px solid #0ac;
                border-bottom: 3px solid #0ac;
                background-color: #19c;
                color:#dfdfdf;
                transition:all ease 0.3s;
            }


            #estacionamento{
                position: relative;
                margin-top: 2em;
                border-left: solid 3px #0ac;
                border-right: solid 3px #0ac;
                width: 100%;
                left: 0%;
                margin-left:-2px;
                /*background-color:  #000;*/
                text-align: center;
            }

            .vaga{
                position: relative;
                margin-top: 0em;
                top:0em;

                /*border: solid 1px #000;*/
                /*padding: 0.5em;*/
                text-align: center;
            }

            #estacionamento .vaga{
                background-color: #f0f0f0;
                overflow: hidden;
                left: -0.5em; 
                vertical-align: middle;
                position: relative;
                display: inline-table;
                width: 6%;
                min-width: 4.94%;
                min-height: 120px;
                height: 140px;
                /*transform: rotate(90deg);*/
                background-size: auto 100%;
                /*border: 1px solid #822;*/
                border-left: solid 2px #0ac; 
                border-right: solid 2px #0ac; 
                padding: 0px 0em 0px 0em;
            }

            #estacionamento #bloco-p .livre{
                background-image: url('../img/livre-deg.png');
                background-repeat: no-repeat;
                /*background-color: #000 !important;*/
            }

            #estacionamento #bloco-p .reservado{
                background-image: url('../img/reservado-deg.png');
                background-repeat: no-repeat;
            }

            #estacionamento #bloco-p .ocupado{
                background-image: url('../img/ocupado-deg.png');
                background-repeat: no-repeat;
            }

            #estacionamento #bloco-p .m-reserva{
                background-image: url('../img/minhareserva-deg.png');
                background-repeat: no-repeat;
            }

            #estacionamento #bloco-p span{
                position: relative;
                /*left:35%;*/
                top:1em;

            }
            #estacionamento #bloco-t span{
                position: relative;
                color:#FFF;
                /*left:27%;*/
                top:2.6em;
                padding-left: 1px;
                padding-right: 2px;
                background-color: #000;
                border-radius: 0.2em;
            }
            #estacionamento span{
                color:#FFF;
                padding-left: 1px;
                padding-right: 2px;
                background-color: #000;
                border-radius: 0.2em;
                z-index:1;
                font-size: 0.7em;



            }

            #bloco-p{
                position:relative;
                border-top: solid 3px #0ac;
                margin-left:0px !important;
                left:0px !important;
            }

            #bloco-s{
                height: 7em;
            }

            #bloco-t{
                border-bottom: solid 3px #0ac;
                margin-left:0px !important;
                left:0px !important;
                /*background-color: #000;*/
            }

            #estacionamento #bloco-t .livre{
                background-image: url('../img/livre-deg-.png');
                background-repeat: no-repeat;
                /*background-color: #000 !important;*/
            }

            #estacionamento #bloco-t .reservado{
                background-image: url('../img/reservado-deg-.png');
                background-repeat: no-repeat;
            }

            #estacionamento #bloco-t .ocupado{
                background-image: url('../img/ocupado-deg-.png');
                background-repeat: no-repeat;
            }

            #estacionamento #bloco-t .m-reserva{
                background-image: url('../img/minhareserva-deg-.png');
                background-repeat: no-repeat;
            }
            #estacionamento #bloco-t .nulo{
                background-image: url('../img/nulo.png');
                background-repeat: no-repeat;
            }            

            #espaco{
                height: 0.1em;
            }
        </style>
    </head>
    <body>
        <div id='m-bk'>
            <div class='item-p'>
                <a href='index.php'><img class='item-p-m' src='../img/parking.png'/><span style='font-size:1.7em'>Parking</span></a>
            </div>
            <div class='item-s'>
                <a href='index.php'><li class='item-s-l ' >Inicio</li></a>
                <a href='cadastrar.php'><li class='item-s-l '>Cadastro</li></a>

                <a href='vagas.php'><li class='item-s-l ativo'>Vagas</li></a>
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
                <a href='index.php'><li class='item-s-lsec '>Inicio</li></a>
                <a href='cadastrar.php'><li class='item-s-lsec '>Cadastro</li></a>

                <a href='vagas.php'><li class='item-s-lsec ativo'>Vagas</li></a>
                <a href='sobre.php'><li class='item-s-lsec '>Sobre</li></a>
                <a href='login.php'><li class='item-t-lsec '>Login</li></a>
            </div></div>
        <!-- Conteúdo -->


        <div id='corpo' >
            <div id='espaco'></div>
            <div id='legenda'>
                <div class='legenda livre'>
                    <span>Livre</span>
                </div>
                <div class='legenda reservado'>
                    <span>Reservado</span>
                </div>
                <div class='legenda ocupado'>
                    <span>Ocupado</span>
                </div>
                <div class='legenda m-reserva'>
                    <span>Minha Reserva</span>
                </div>
            </div>
            <div id='estacionamento'>
                <div id='bloco-p'>
                    <?php
                    require '../class/conBD.php';
//                    session_start();
//                    $login = $_SESSION["login"];
//                    $senhaMd5 = $_SESSION["senhamd5"];
//                    session_abort();
                    $conbd = new conBD;
                    $linkBD = $conbd->conectarBD("Falha");

                    $vagaSql = "SELECT * FROM (SELECT tg.vagas.pknmvaga, tg.vagas.numerovaga, tg.vagas.estadovaga, TIME_FORMAT(tg.reservas.hrentrada, '%H:%i') AS hrentrada,  TIME_FORMAT(tg.reservas.hrsaida, '%H:%i') AS hrsaida FROM tg.vagas LEFT join tg.reservas ON tg.reservas.fkvaga = tg.vagas.numerovaga) AS teste where teste.pknmvaga <12 GROUP BY numerovaga order BY numerovaga ASC; ";
                    $mvagaSql = "SELECT tg.vagas.pknmvaga AS vaga  FROM tg.vagas, tg.reservas WHERE tg.reservas.fkvaga = tg.vagas.pknmvaga AND tg.reservas.fkusuario = 2";



                    $result = mysqli_query($linkBD, $vagaSql);
                    $resultM = mysqli_fetch_assoc(mysqli_query($linkBD, $mvagaSql));
//                    echo $resultM['vaga'];
                    for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
                        $registro = mysqli_fetch_assoc($result);
                        foreach ($registro as $key => $value) {
                            $comando = "\$" . $key . "='" . $value . "';";
//                            echo "$comando";
                            eval($comando);
                        }
                        $estadovaga = ($numerovaga == $resultM['vaga']) ? 'm-reserva' : (($estadovaga == 0) ? 'livre' : (($estadovaga == 1) ? 'reservado' : 'ocupado'));

                        $hrentrada = ($hrentrada != '' || $hrentrada != null) ? $hrentrada : '&emsp;-&emsp;';
                        $hrsaida = ($hrsaida != '' || $hrsaida != null) ? $hrsaida : '&emsp;-&emsp;';
                        echo "<div class='vaga $estadovaga'><input type='radio' style=' display: none;' value='$numerovaga' name='v-radio' id='v$numerovaga-radio'/>
                        <label for='v$numerovaga-radio'><span>$numerovaga</span><br><span>E:$hrentrada</span><br><span>S:$hrsaida</span></label></div>";
                    }
                    ?>

                </div>
                <div id='bloco-s'>

                </div>
                <div id='bloco-t'>
                    <style>

                        input[type=radio]{
                            display:none;
                        }

                        input[type=radio] + label{
                            position: relative; 
                            left: 10px;
                            float:left;
                            cursor: pointer;

                            height:20px;
                            /*padding:0em 1.2em 0em 0em;*/
                            margin:auto;
                            background-image: url('./../img/radio.png');
                            background-repeat:no-repeat;
                            background-position:0 0;
                            transition: all ease .1s;
                        }



                        input[type=radio]:checked + label{
                            background-position:0 0px;
                            background-position-x: 3em;
                        }



                        input[type=radio]:checked + label{
                            background-position:0 -20px;
                        }

                    </style>
                    <?php
                    $result = mysqli_query($linkBD, "SELECT * FROM (SELECT tg.vagas.pknmvaga, tg.vagas.numerovaga, tg.vagas.estadovaga, TIME_FORMAT(tg.reservas.hrentrada, '%H:%i') AS hrentrada,  TIME_FORMAT(tg.reservas.hrsaida, '%H:%i') AS hrsaida FROM tg.vagas LEFT join tg.reservas ON tg.reservas.fkvaga = tg.vagas.numerovaga) AS teste where teste.pknmvaga >=12 GROUP BY numerovaga order BY numerovaga ASC; ");
                    for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
                        $registro = mysqli_fetch_assoc($result);
                        foreach ($registro as $key => $value) {
                            $comando = "\$" . $key . "='" . $value . "';";
//                            echo "$comando";

                            eval($comando);
                        }

                        $ii = $i + 12;
                        $estadovaga = ($estadovaga == 0) ? 'livre' : (($estadovaga == 1) ? 'reservado' : 'ocupado');
                        $hrentrada = ($hrentrada != '' || $hrentrada != null) ? $hrentrada : '&emsp;-&emsp;';
                        $hrsaida = ($hrsaida != '' || $hrsaida != null) ? $hrsaida : '&emsp;-&emsp;';
                        echo "<div class='vaga $estadovaga'><input type='radio' style=' display: none;' value='$ii' name='v-radio' id='v$ii-radio'/>
                        <label for='v$ii-radio'><span>E:$hrentrada</span><br><span>S:$hrsaida</span><br><span>$ii</span></label></div>";
                    }
                    for($i=0; $i<10; $i++){
                        echo "<div class='vaga'></div>";
                    }
                    ?>
                    
                    
                    <div class='vaga ' style="width: 7.8em !important;"></div>

                </div>
<!--                <input type="">-->
            </div>
            <div id='problema'><span>Relatar Problema</span>
            </div></div>

        <!--Ródape-->
        <footer style='position:relative; top:10px; float:bottom;'><p>Outro teste</p></footer></body></html>