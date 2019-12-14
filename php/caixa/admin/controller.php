<?php
session_start();

$idpedido = $_POST['comanda'];
$clientemesa = $_POST['clientemesa'];
$couver = $_POST['couver'];
$servico = $_POST['servico'];


//setando as variaveis acima na sessão
$_SESSION["pedido"]["id"] = $idpedido;
$_SESSION["clientemesa"] = $clientemesa;
$_SESSION["couver"] = $couver;
$_SESSION["servico"] = $servico;
//redirecionando para as pagina aonde usaremos os dados
header('location: ../../../admin/cashier/fechamentopedido.php');
