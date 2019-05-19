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
                        $estadovaga = ($numerovaga == $resultM['vaga']) ? 'm-reserva' : (($estadovaga == 0) ? 'livre' : (($estadovaga == 1) ? 'reservado' : (($estadovaga == 2) ? 'ocupado' : "incorreto")));

                        $hrentrada = ($hrentrada != '' || $hrentrada != null) ? $hrentrada : '&emsp;-&emsp;';
                        $hrsaida = ($hrsaida != '' || $hrsaida != null) ? $hrsaida : '&emsp;-&emsp;';
                        echo "<div class='vaga $estadovaga'><input type='radio' style=' display: none;' value='$numerovaga' name='v-radio' id='v$numerovaga-radio' onclick='calendarioData(0);'/>
                        <label for='v$numerovaga-radio'><span>$numerovaga</span><br><span>E:$hrentrada</span><br><span>S:$hrsaida</span></label></div>";
                    }
                    echo  "</div>
                <div id='bloco-s'>

                </div>
                <div id='bloco-t'>";
                    
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
                        echo "<div class='vaga $estadovaga'><input type='radio' style=' display: none;' value='$ii' name='v-radio' id='v$ii-radio' onclick='calendarioData(0);'/>
                        <label for='v$ii-radio'><span>E:$hrentrada</span><br><span>S:$hrsaida</span><br><span>$ii</span></label></div>";
                    }
//                    for ($i = 0; $i < 10; $i++) {
//                        echo "<div class='vaga'></div>";
//                    }
                    echo "<div class='vaga ' style='width: 20.7em !important; border:transparent !important; background-color:transparent!important; '></div>

                </div>
            </div>
            <a href='problema.php'><div id='problema'><span>Relatar Problema</span>
            </div></a></div>
<p style='position:relative;width:20%;min-heigth:0.1em;background-color:#000;display:block;font-size:0.12em;'><br></p>
        <span id='cancelar' onclick='history.go(0)'>X</span>
        <span id='localvaga'>A</span>
        <span id='diareserva'>B</span>
        <button id='avancarCal' value='0' onclick='calendarioData(this.value);' >Avançar</button>";
    }
}
