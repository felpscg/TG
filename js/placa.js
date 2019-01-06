/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function valida() {
    	var txtPlaca = document.getElementById("placa");
var er = /[a-z]{3}?\d{4}/gim;
////Expressão regular para 3 letras e 4 números		
if (txtPlaca.value == "") {
    alert("Digite a placa de seu veículo.");
} else if (txtPlaca.value != "") {
    er.lastIndex = 0;
    pl = txtPlaca.value;
    if (!er.test(pl)) {
            alert("Placa inválida.Uma placa válida deve contem 3 letras e 4 números.\n");
            txtPlaca.value='';
    }
}
}