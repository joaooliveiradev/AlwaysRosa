<?php
try {
    include '../../php/conexao.php';
    $id = $_GET['id'];
    $status_pedido = 1;
    $stmt = $conexao->prepare("UPDATE itens SET status_pedido =:status_pedido WHERE iditens=:id");
    $stmt->bindValue(':status_pedido', $status_pedido);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    header('Location: ../../admin/cozinha.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
