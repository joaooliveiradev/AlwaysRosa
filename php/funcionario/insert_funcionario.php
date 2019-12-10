<?php

include '../../php/conexao.php';
$login = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$selectvalue = $_POST['selectCategoria'];

$stmt = $conexao->prepare("INSERT INTO usuario (login,senha,id_cargo) VALUES (:login,:senha,:id_cargo)");
$stmt->bindValue(":login", $login);
$stmt->bindValue(":senha", $senha);
$stmt->bindValue(":id_cargo", $selectvalue);
$stmt->execute();
header('location: ../../admin/cadastro.php');

