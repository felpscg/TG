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
        <style>
            @import url('../css/font.css');

            #meses{
                position: fixed;
                margin-left: -150px;
                left: 50%;
                width: 300px;
                height: auto;
                margin-top: 1.5em;
                background-color: transparent;
                z-index: 555;
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
                z-index: 566;
            }
            #avancarCal{
                position: relative;

                z-index:666;
            }
/*            #tempo-IO{
                position: fixed;
                width: 25em;
                height: 7em;
                padding: 0em;
                z-index:10777;
                background-color: #fff !important;
            }*/
.campo{
    position: fixed;
                width: 25em;
                height: 7em;
                margin: 0em;
                z-index: 777;
                padding: 0em !important;
                background-color: #fff !important;
}            
.nome-campo, .item-campo{
    padding: 0px;
    margin: 0px; 
}
p{
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

        <div id="fundo-s"></div>
        <button id="avancarCal">Avançar</button>
        <footer style='position:relative; top:10px; float:bottom;'>
            <p>Outro teste</p>
        </footer>
    </body>
</html>