<?php
try {
    include '../conexao.php';
    $iditens = $_GET['iditens'];
    $sql = $conexao->prepare('DELETE FROM itens WHERE iditens = :iditens');
    $sql->bindValue(':iditens', $iditens);
    $sql->execute();

    header('location: ../../garcom/pedidosandamento.php');
} catch (PDOException $e) {
    echo "Erro " . $e->getMessage();
}
