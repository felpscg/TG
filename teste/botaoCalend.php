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
        </style>
    <body>
        <div id="fundo-p">
        <?php
        require './calendario.php';
        echo "<div id='meses'>";
        echo "<div class='mes'>";
        MostreCalendario('04');
        echo "</div>";
        echo "<div class='mes'>";
        MostreCalendario('05');
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