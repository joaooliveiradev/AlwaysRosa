<?php
try {
    include '../../php/conexao.php';

    $id = filter_input(INPUT_POST, 'idmesa', FILTER_DEFAULT);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_DEFAULT);
    $stmt = $conexao->prepare("UPDATE mesa SET numero=:numero WHERE idmesa=:id");
    $stmt->bindValue(':numero', $numero);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    header('Location: ../../admin/cadastromesa.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
