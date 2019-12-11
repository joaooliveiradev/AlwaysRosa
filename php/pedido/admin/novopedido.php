<?php
session_start();
include '../../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idmesa = $_POST["mesa"];
    $stmt = $conexao->prepare("INSERT INTO pedido (idmesa) VALUES (?)");
    $stmt->bindParam(1, $idmesa);
    if ($stmt->execute()) {
        $_SESSION["pedido"]["id"] = $conexao->lastInsertId();
        $stmt2 = $conexao->prepare("UPDATE mesa SET status=:status WHERE idmesa=:idmesa ");
        $stmt2->bindValue(':idmesa', $idmesa);
        $stmt2->bindValue(':status', 1);
        $stmt2->execute();
        header('location: ../../../admin/garcom/produtos.php');
    } else {
        session_unset();
    }
}
