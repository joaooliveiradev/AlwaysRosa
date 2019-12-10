<?php
try {
    include '../conexao.php';

    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
    $produto = filter_input(INPUT_POST, 'produto', FILTER_DEFAULT);
    $selectvalue = $_POST['categoria'];
    $preco = filter_input(INPUT_POST, 'preco', FILTER_DEFAULT);

    $stmt = $conexao->prepare("UPDATE produtos SET descricao = :produto, categoria_idcategoria = :selectvalue, preco = :preco WHERE idprodutos=:id");
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':produto', $produto);
    $stmt->bindValue(':selectvalue', $selectvalue);
    $stmt->bindValue(':preco', $preco);
    $stmt->execute();
    header('Location: ../../admin/cadastroproduto.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}