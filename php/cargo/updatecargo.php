<?php
try {
    include '../../php/conexao.php';

    $id = filter_input(INPUT_POST, 'id_cargo', FILTER_DEFAULT);
    $nome_cargo = filter_input(INPUT_POST, 'nome_cargo', FILTER_DEFAULT);
    $stmt = $conexao->prepare("UPDATE cargo SET nome_cargo=:nome_cargo WHERE id_cargo=:id");
    $stmt->bindValue(':nome_cargo', $nome_cargo);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    header('Location: ../../admin/cadastrocargo.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
