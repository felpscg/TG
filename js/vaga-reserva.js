setTimeout(function () {
    var valorav = document.getElementById('avancarCal').value;
    if (valorav == 0 || valorav == -1)
        window.location.reload(1);
}, 10000);

var est;
function validahr(est) {
    var erroIns = 'Insira um horário válido\n Horário de funcionamento \n Abre as : 08:00 \n Fecha as: 18:00';
    var hr;
    var hrs;
    var min;
    if (est == 0) {
        hr = document.getElementById('hrentrada').value;
        hrs = (hr.substring(0, 2));
        if (hrs < 08 || hrs > 18) {
            alert(erroIns);
        }
    }
    if (est == 1) {
        hr = document.getElementById('hrsaida').value;
        hrs = (hr.substring(0, 2));
        min = (hr.substring(3, 5));
        if (hrs >= 18 && min > 00 || hrs < 08) {
            alert(erroIns);
        }
        hre = document.getElementById('hrentrada').value;
        hrse = (hr.substring(0, 2));
        mine = (hr.substring(3, 5));
        
        hrs = document.getElementById('hrsaida').value;
        hrss = (hr.substring(0, 2));
        mins = (hr.substring(3, 5));
        
        if(hre>hrss || (hre>hrss && mine>=mins)){
            alert(erroIns);
        }

    }

}

var mesdia;
function setDataDiaMes(mesdia) {
    document.getElementById('diamesin').value = (mesdia);
}
var valor;
function calendarioData(valor) {
    var valorvaga = 0;
    var diames = 0;
    var els = document.getElementsByName('v-radio');
    var campodia = document.getElementsByName('diames');



    if (valor == 0) {
//                    alert('Teste');
        for (var i = 0; i < els.length; i++) {
            if (els[i].checked) {
                valorvaga = (i + 1);
            }
        }



        document.getElementById('avancarCal').value = ('1');
        document.getElementById('avancarCal').style = ('display:none;');
        document.getElementById('meses').style = ('z-index:555;');
        document.getElementById('fundo-p').style = ('z-index:566;');
        document.getElementById('cancelar').style = ('display:block;');
        document.getElementById('localvaga').style = ('display:block;');
        document.getElementById('localvaga').innerHTML = 'Vaga: ' + valorvaga;
        document.getElementById('diareserva').innerHTML = 'Dia:     -';
        document.getElementById('diareserva').style = ('display:block;');

    } else if (valor == 1) {
        for (var i = 0; i < campodia.length; i++) {
            if (campodia[i].checked) {
                diames = campodia[i].value;
                mes = (diames.substring(0, 2));
                dia = (diames.substring(2, 4));
                if (dia < 10)
                    dia = '0' + dia;
                diames = dia + '/' + mes;
            }
        }
        document.getElementById('avancarCal').value = ('2');
        document.getElementById('tempo-IO').style = ('z-index:999;');
        document.getElementsByClassName('campo').style = ('z-index:1000;');
        document.getElementById('avancarCal').style = ('display:block;');
        document.getElementById('cancelar').style = ('display:block;');
        document.getElementById('diareserva').innerHTML = 'Dia:     ' + diames;
    } else if (valor == 2) {
        document.getElementById('avancarCal').value = ('-1');
    } else {
        history.go(0);
    }
}

