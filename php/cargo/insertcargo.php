<?php

include '../../php/conexao.php';
$nome_cargo = filter_input(INPUT_POST, 'cargo', FILTER_DEFAULT);
$stmt = $conexao->prepare("INSERT INTO cargo (nome_cargo) VALUES (:nome_cargo)");
$stmt->bindValue(":nome_cargo", $nome_cargo);
$stmt->execute();
header('location: ../../admin/cadastrocargo.php');

