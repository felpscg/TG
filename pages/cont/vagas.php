<?php

/**
 * Description of vagas
 *
 * @author Felipe Corrêa Gomes
 * Criado em 11/01/2019
 */
class vagas {
    function __construct() {
        echo ""
            ."<style>
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
                vertical-align: middle;
                position: relative;
                display: inline-table;
                width: 4.95%;
                min-width: 4.94%;
                min-height: 120px;
                height: 140px;
                /*transform: rotate(90deg);*/
                background-size: auto 100%;
                /*border: 1px solid #822;*/
                border-left: solid 2px #0ac; 
                border-right: solid 2px #0ac; 
                padding: 0px 0.55em 0px 0px;
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
                    <div class='vaga livre'><span>1</span><br><span>E: - </span><br><span>S: - </span></div>
                    <div class='vaga ocupado'><span>2</span><br><span>E:12:00</span><br><span>S:15:00</span></div>
                    <div class='vaga m-reserva'><span>3</span><br><span>E:12:00</span><br><span>S:15:00</span></div>
                    <div class='vaga reservado'><span>4</span><br><span>E:12:00</span><br><span>S:15:00</span></div>
                    <div class='vaga ocupado'><span>5</span><br><span>E:12:00</span><br><span>S:15:00</span></div>
                    <div class='vaga livre'><span>6</span><br><span>E:12:00</span><br><span>S:15:00</span></div>
                    <div class='vaga ocupado'><span>7</span><br><span>E:12:00</span><br><span>S:15:00</span></div>
                    <div class='vaga livre'><span>8</span><br><span>E:12:00</span><br><span>S:15:00</span></div>
                    <div class='vaga reservado'><span>9</span><br><span>E:12:00</span><br><span>S:15:00</span></div>
                    <div class='vaga livre'><span>10</span><br><span>E:12:00</span><br><span>S:15:00</span></div>
                    <div class='vaga ocupado'><span>11</span><br><span>E:12:00</span><br><span>S:15:00</span></div>

                </div>
                <div id='bloco-s'>

                </div>
                <div id='bloco-t'>
                    <input type='checkbox' class='cbvaga' name='vaga' value=1><div class='vaga livre'><span>E:12:00</span><br><span>S:15:00</span><br><span>12</span></div></input>
                    <div class='vaga reservado'><span>E:12:00</span><br><span>S:15:00</span><br><span>13</span></div>
                    <div class='vaga reservado'><span>E:12:00</span><br><span>S:15:00</span><br><span>14</span></div>
                    <div class='vaga ocupado'><span>E:12:00</span><br><span>S:15:00</span><br><span>15</span></div>
                    <div class='vaga livre'><span>E:12:00</span><br><span>S:15:00</span><br><span>16</span></div>
                    <div class='vaga reservado'><span>E:12:00</span><br><span>S:15:00</span><br><span>17</span></div>
                    <div class='vaga ocupado'><span>E:12:00</span><br><span>S:15:00</span><br><span>18</span></div>
                    <div class='vaga livre'><span>E:12:00</span><br><span>S:15:00</span><br><span>19</span></div>
                    <div class='vaga nulo'></div>
                    <div class='vaga nulo'></div>
                    <div class='vaga nulo'></div>
                    <div class='vaga nulo'></div>

                </div>
            </div>
            <div id='problema'><span>Relatar Problema</span></div>"
        ."</div>";
    }
}
