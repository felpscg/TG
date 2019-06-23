<?php

/**
 * Description of vagas
 *
 * @author Felipe Corrêa Gomes
 * Criado em 11/01/2019
 */
class reserva {

    function __construct() {
        echo ""
        . " <form action = '#' method = 'POST'>\n"
        . "    <!------------------------->

        <div id='tempo-IO' >
            <div class = 'campo'>
                <div class = 'nome-campo'>
                    <p><span>Horário de Entrada:</span></p>
                    <p><span>Horário de Saída:</span></p>
                </div>
                <div class = 'item-campo'>
                    <p><input type='time' id='hrentrada' name='hrentrada' onblur='validahr(0);'></p>
                    <p><input type='time' id='hrsaida' name='hrsaida' onblur='validahr(1);'></p>
                </div>
            </div>
        </div>
        
        <div id='fundo-p' >";

        require '../class/calendario.php';
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

        echo "</div>
        <div id='fundo-s'></div>
        <input type='hidden' id='diamesin' value=0 />



        <!----------------------
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
        
        <div id='m-bksec'> 
            <div class='item-psec'>
                <a href='index.php'><img class='item-p-msec' src='../img/parking.png'/></a>
            </div>
            <div class='top-checkbox'>
                <input type='checkbox' value='0' name='campo-checkbox' id='campo-checkbox' onclick='exibeItens('item-ssec');'/>
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
            </div>
        </div> -->


        <div id='corpo' '>
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
                <div id='bloco-p'>";
        $login = $_SESSION['login'];
        require '../class/conBD.php';
        $conbd = new conBD;
        $linkBD = $conbd->conectarBD("Falha");
        $vagaSql = "SELECT vagas.pknmvaga, vagas.numerovaga, vagas.estadovaga FROM tg.vagas WHERE vagas.pknmvaga <12 order BY numerovaga ASC;";
        $mvagaSql = "SELECT tg.vagas.pknmvaga AS vaga  FROM tg.vagas, tg.reservas WHERE tg.reservas.fkvaga = tg.vagas.pknmvaga AND tg.reservas.fkusuario = (SELECT usuarios.pkusuario FROM usuarios WHERE usuarios.cpf = $login OR usuarios.email = $login  )";
        $result = mysqli_query($linkBD, $vagaSql);
        $resultM = mysqli_fetch_assoc(mysqli_query($linkBD, $mvagaSql));
        $booleanVaga = FALSE;
        if (mysqli_num_rows(mysqli_query($linkBD, $mvagaSql)) > 0) {
            $booleanVaga = TRUE;
        }
        for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
            $hrentrada = '';
            $hrsaida = '';
            $registro = mysqli_fetch_assoc($result);

            foreach ($registro as $key => $value) {
                $comando = "\$" . $key . "='" . $value . "';";
//                echo "$comando";
                eval($comando);
            }

            $verReservaDia = "SELECT TIME_FORMAT(tg.reservas.hrentrada, '%H:%i') AS hrentrada,  TIME_FORMAT(tg.reservas.hrsaida, '%H:%i') AS hrsaida FROM reservas WHERE reservas.fkvaga = '$numerovaga' AND reservas.dataentrada = '" . date('Y-m-d') . "';";

            $ResultResDia = mysqli_fetch_assoc(mysqli_query($linkBD, $verReservaDia));

            if (isset($ResultResDia)) {
                foreach ($ResultResDia as $key => $value) {
                    $comando = "\$" . $key . "='" . $value . "';";
//                echo "$comando";
                    eval($comando);
                }
            }
//            exit(0);
            $estadovaga = ($numerovaga == $resultM['vaga']) ? 'm-reserva' : (($estadovaga == 0) ? 'livre' : (($estadovaga == 1) ? 'reservado' : (($estadovaga == 2) ? 'ocupado' : "incorreto")));

            $hrentrada = ($hrentrada != '' || $hrentrada != null) ? $hrentrada : '&emsp;-&emsp;';
            $hrsaida = ($hrsaida != '' || $hrsaida != null) ? $hrsaida : '&emsp;-&emsp;';
            echo "<div class='vaga $estadovaga'><input type='radio' style=' display: none;' value='$numerovaga' name='v-radio' id='v$numerovaga-radio' onclick='calendarioData(0);'/>
                        <label for='v$numerovaga-radio'><span>$numerovaga</span><br><span>E:$hrentrada</span><br><span>S:$hrsaida</span></label></div>";
        }
        echo "</div> <div id='bloco-s'> </div> <div id='bloco-t'>";




        $result = mysqli_query($linkBD, "SELECT vagas.pknmvaga, vagas.numerovaga, vagas.estadovaga FROM tg.vagas WHERE vagas.pknmvaga >=12 order BY numerovaga ASC;");
        for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
            $hrentrada = '';
            $hrsaida = '';
            $registro = mysqli_fetch_assoc($result);
            foreach ($registro as $key => $value) {
                $comando = "\$" . $key . "='" . $value . "';";
                eval($comando);
            }
            $ii = $i + 12;
            $verReservaDia = "SELECT TIME_FORMAT(tg.reservas.hrentrada, '%H:%i') AS hrentrada,  TIME_FORMAT(tg.reservas.hrsaida, '%H:%i') AS hrsaida FROM reservas WHERE reservas.fkvaga = '$numerovaga' AND reservas.dataentrada = '" . date('Y-m-d') . "';";
            $ResultResDia = mysqli_fetch_assoc(mysqli_query($linkBD, $verReservaDia));
            if (isset($ResultResDia)) {
                foreach ($ResultResDia as $key => $value) {
                    $comando = "\$" . $key . "='" . $value . "';";
                    eval($comando);
                }
            }
            $estadovaga = ($numerovaga == $resultM['vaga']) ? 'm-reserva' : (($estadovaga == 0) ? 'livre' : (($estadovaga == 1) ? 'reservado' : (($estadovaga == 2) ? 'ocupado' : "incorreto")));
            $hrentrada = ($hrentrada != '' || $hrentrada != null) ? $hrentrada : '&emsp;-&emsp;';
            $hrsaida = ($hrsaida != '' || $hrsaida != null) ? $hrsaida : '&emsp;-&emsp;';
            echo "<div class='vaga $estadovaga'><input type='radio' style=' display: none;' value='$ii' name='v-radio' id='v$ii-radio' onclick='calendarioData(0);'/>
                        <label for='v$ii-radio'><span>E:$hrentrada</span><br><span>S:$hrsaida</span><br><span>$ii</span></label></div>";
        }

        $diaSql = "SELECT reservas.dataentrada, reservas.hrentrada, reservas.hrsaida FROM tg.reservas "
                . "WHERE reservas.fkusuario = (SELECT usuarios.pkusuario "
                . "FROM usuarios WHERE usuarios.cpf = $login OR usuarios.email = $login)";
        $resultDia = mysqli_fetch_assoc(mysqli_query($linkBD, $diaSql));
        $ano = substr($resultDia['dataentrada'], 0, 4);
        $mes = substr($resultDia['dataentrada'], 5, 2);
        $dia = substr($resultDia['dataentrada'], 8, 2);
        $hrentrada = substr($resultDia['hrentrada'],0, 5);
        $hrsaida = substr($resultDia['hrsaida'], 0, 5);
        echo "<div class='vaga ' style='width: 20.7em !important; border:transparent !important; background-color:transparent!important; '></div>

                </div>
            </div>
            <a href='problema.php'><div id='problema'><span>Relatar Problema</span>
            </div></a>";
        $bt = ($booleanVaga == TRUE) ? ("<a href='acesso/removerReserva.php'><div id='cancelareserva'><span>Cancelar Reserva</span>") : ("");
        echo $bt . "</div></a>
            <div id='diareservado' style = 'top:15em'><span>Data da reserva: " . $dia . "/" . $mes . "/" . $ano . "</span>
                <br><span>Entrada: " .$hrentrada. "</span>
                    <br><span>Saida: " .$hrsaida. "</span>
            </div>            
            </div>
        <p style='position:relative;width:20%;min-heigth:0.1em;background-color:#000;display:block;font-size:0.12em;'><br></p>
        <span id='cancelar' onclick='history.go(0)'>X</span>
        <span id='localvaga'>A</span>
        <span id='diareserva'>B</span>
        <input type='hidden' name='est' value='cad'/>
        <button id='avancarCal' value='0' onclick='calendarioData(this.value);' >Avançar</button>
        </form>";
    }

}
