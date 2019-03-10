<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calendário em PHP</title>
    <?php 
        date_default_timezone_set('America/Sao_Paulo');

        $hoje = getdate();

        echo $ultimoDia = cal_days_in_month(CAL_GREGORIAN,
                                       $hoje['mon'],
                                       $hoje['year']);
	   echo $ultimoDia2 = cal_days_in_month(CAL_GREGORIAN,3,$hoje['year']);
		
        $primeiraSemana = (($hoje['wday'] + 1) - ($hoje['mday'] - ((int)($hoje['mday'] / 6) * 7))) % 7;
        // Alternativa:
        /*$primeiroDiaTimestamp = strtotime(sprintf("%d-%0d-01",
                                                  $hoje['year'],
                                                  $hoje['mon']));
        $primeiraSemana = (int)date('w', $primeiroDiaTimestamp);*/
    ?>

    <style>
        td[data-semana="0"] { color: #ff0000; }
    </style>
</head>
<body>
    <h1>Estamos em <?= $hoje['year'] ?></h1>
    <p><?= sprintf('Hoje é dia <strong>%0d / %0d</strong>, agora são %02d horas e %0d minutos.',
                   $hoje['mday'], $hoje['mon'], $hoje['hours'], $hoje['minutes'])
    ?></p>

    <table border="1">
        <tr>
            <th>Dom</th>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sáb</th>
        </tr>
        <tr>
        <?php
        for($semana = 0; $semana < $primeiraSemana; ++$semana) {
            echo '<td>&nbsp;</td>';
        }
        for($dia = 1; $dia < $ultimoDia; ++$dia) {
            if( $semana > 6 ) {
                $semana = 0;
                echo '</tr><tr>';
            }

            echo "<td data-semana=\"$semana\">";
            echo "$dia</td>";
            ++$semana;
        }
        for(; $semana < 7; ++$semana) {
            echo '<td>&nbsp;</td>';
        }
        ?>
        </tr>
    </table>
</body>
</html>