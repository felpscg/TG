
function telaInteira() {
    if (document.getElementById('tela-checkbox').checked) {
        var el = document.body;

        var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen
                || el.mozRequestFullScreen || el.msRequestFullScreen;

        if (requestMethod) {

            // Native full screen.
            requestMethod.call(el);

        } else if (typeof window.ActiveXObject !== "undefined") {

            // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");

            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    } else {

    }
}

function exibeItens(t) {
    var te = document.getElementById(t).style;
    if (document.getElementById('campo-checkbox').checked) {

        te.display = ("inline-block");
    } else {

        te.display = ("none");

    }
}
;