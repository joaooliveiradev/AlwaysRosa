<?php
try {
    include '../conexao.php';
    $id = filter_input(INPUT_POST, 'idcategoria', FILTER_DEFAULT);
    $nome = filter_input(INPUT_POST, 'nomecategoria', FILTER_DEFAULT);
    $stmt = $conexao->prepare("UPDATE categoria SET nome = :nome WHERE idcategoria=:id");
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':nome', $nome);
    $stmt->execute();
    header('Location: ../../admin/cadastrocategoria.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}