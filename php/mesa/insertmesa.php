<?php

include '../../php/conexao.php';


$numero = filter_input(INPUT_POST, 'numero', FILTER_DEFAULT);
$stmt = $conexao->prepare("INSERT INTO MESA (numero) VALUES (:numero)");
$stmt->bindValue(":numero", $numero);
$stmt->execute();
header('location: ../../admin/cadastromesa.php');
