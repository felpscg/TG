<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . './class/conBD.php';
$BD = new conBD();
$con = $BD->conectarBD("Falha ao conectar, erro na instrução SQL");
session_start();
$login = $_SESSION["login"];

echo $queryLogin = "SELECT usuarios.pkusuario FROM usuarios WHERE usuarios.cpf = '$login' OR usuarios.email = '$login';";
$registro = mysqli_fetch_assoc(mysqli_query($con, $queryLogin));

echo $queryVerifica = "SELECT reservas.fkvaga FROM reservas WHERE reservas.fkusuario = '$registro[pkusuario]';";
$registroReserva = mysqli_fetch_assoc(mysqli_query($con, $queryVerifica));
$query = "DELETE FROM reservas WHERE reservas.fkusuario = '$registro[pkusuario]';";
$queryt = " UPDATE vagas SET `vagas`.estadovaga='0' WHERE `vagas`.numerovaga='$registroReserva[fkvaga]'";
//echo $query;
//exit();
mysqli_query($con, $query);
mysqli_query($con, $queryt);

header('location:../reserva.php');
session_abort();
