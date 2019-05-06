<html>
    <head>
        <meta charset='UTF-8'>
        <title>Parking</title>
        <!--CSS-->
        <link rel='stylesheet' type='text/css' href='../css/menu.css'>
        <!--JS--><script charset='utf-8' type='text/javascript' src='../js/cep.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='../js/placa.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='../js/cpf.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='../js/menu.js' defer='defer'></script>
        <script charset='utf-8' type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js' defer='defer'></script>
        <script>
            var mesdia;
            function setDataDiaMes(mesdia) {
                document.getElementById("diamesin").value = (mesdia);
            }
            var valor;
            function calendarioData(valor) {
                if (valor == 0) {
//                    alert("Teste");
                    document.getElementById("avancarCal").value = ("1");
                    document.getElementById("avancarCal").style = ("display:none;");
                    document.getElementById("meses").style = ("z-index:555;");
                    document.getElementById("fundo-p").style = ("z-index:566;");

                } else if (valor == 1) {
                    document.getElementById("avancarCal").value = ("2");
                    document.getElementById("tempo-IO").style = ("z-index:999;");
                    document.getElementsByClassName("campo").style = ("z-index:1000;");
                    document.getElementById("avancarCal").style = ("display:block;");
                } else if (valor == 2) {
                    document.getElementById("avancarCal").value = ("-1");
                    alert(document.getElementById("diamesin").value);
                } else {
                    history.go(0);
                }
            }
        </script>
        <style>
            @import url('../css/font.css');
            [name="diames"]{
                display: none;
            }
            #mesdialabel{
                cursor: pointer;
            }
            #qualquer{
                position: fixed;
                left: 0px;
                top:0em;
                width: 100%;
                height: 30em;
                background-color: #fff;
                z-index: 444;
            }
            #avancarCal{
                position: absolute;
                left: 70%;
                margin-left: 2em;
                top: 23em;
                z-index: 2000;
                /*z-index: 20000;*/
            }
            #meses{
                position: fixed;
                margin-left: -150px;
                left: 50%;
                width: 300px;
                height: auto;
                margin-top: 1.5em;
                background-color: transparent;
                z-index: 55;
                /*z-index: 555;*/
            }
            .mes{
                border: 1px #000 solid;
                padding-top: 1em; 
                margin-bottom:1em; 
                background-color: #fff;
            }
            #fundo-p{
                position:fixed;
                width: 100%;
                margin:0px;
                height: 650px;
                background-color: rgba(0,0,0,0.5);
                z-index: 56;
                /*z-index: 566;*/
            }

            #tempo-IO{
                position: fixed;
                width: 100%;
                height: 30em;
                background-color:rgba(0,0,0,0.4);
                z-index: 10;
                /*z-index: 1000;*/
            }
            .campo{
                position: fixed;

                left:50%;
                margin-left: -6.5em;
                width: 13em;
                height: 4.4em;
                z-index: 777;
                padding: 0em !important;
                background-color: #fff !important;
                top:11em;
                z-index: 99;
                /*z-index: 999;*/
            }            
            .nome-campo, .item-campo{
                padding: 0px;
                margin: 0px; 
            }
            .nome-campo{
                padding-right: 1em !important;
                padding-left: 1em !important;
                width: 50% !important;
            }
            .item-campo{
                width: 30% !important;
                right: 10%;
            }
            p{
                font-size: 0.8em;
                padding: 0px;
                margin: 0px; 

            }
        </style>
    <body>
        <div id="tempo-IO">
            <div class = 'campo'>
                <div class = 'nome-campo'>
                    <p><span>Horário de Entrada:</span></p>
                    <p><span>Horário de Saída:</span></p>
                </div>
                <div class = 'item-campo'>
                    <p><input type="time"></p>
                    <p><input type="time"></p>
                </div>
            </div>
        </div>
        <div id="fundo-p">
            <?php
            require './calendario.php';
            echo "<div id='meses'>";
            echo "<div class='mes'>";
            $mesAtual = date("m");
            $arrayMesAtual = str_split($mesAtual);
            if (intval($mesAtual) < 9) {
                $arrayMesAtual[1] ++;
            } else if (intval($mesAtual) == 9) {
                $arrayMesAtual[0] ++;
                $arrayMesAtual[1] = 0;
            } else if (intval($mesAtual) > 9 && intval($mesAtual) <= 11) {
                $arrayMesAtual[1] ++;
            } else if (intval($mesAtual) > 9 && intval($mesAtual) <= 11) {
                $arrayMesAtual[0] = 0;
                $arrayMesAtual[1] = 1;
            }

            $proximoMes = implode("", $arrayMesAtual);
            MostreCalendario($mesAtual);
            echo "</div>";
            echo "<div class='mes'>";
            MostreCalendario($proximoMes);

            echo "</div>"
            . "</div>";
            ?>

        </div>
        <div id="qualquer">

        </div>
        <div id="fundo-s"></div>
        <input type="hidden" id="diamesin" value=0 />
        <button id="avancarCal" value="0" onclick="calendarioData(this.value);">Avançar</button>

        <footer style='position:relative; top:10px; float:bottom;'>
            <p>Outro teste</p>
        </footer>
    </body>
</html>