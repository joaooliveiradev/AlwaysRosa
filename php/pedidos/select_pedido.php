<?php
session_start();
include '../conexao.php';
$pedidoValue = $_POST['idpedido'];

try {
    $stmt = $conexao->prepare("SELECT produtos.descricao,itens.observacao,itens.preco, categoria.nome FROM produtos inner join itens ON produtos.idprodutos = itens.id_produtos_fk inner join categoria on produtos.categoria_idcategoria = categoria.idcategoria where id_pedido = :id");
    $stmt->bindValue(':id', $pedidoValue);
    $stmt->execute();
    if ($stmt->rowCount()) {
        foreach ($stmt as $res) :
            extract($res);
            echo '<tr>';
            echo '<td>' . $pedidoValue . '</td>';
            echo '<td>' . $descricao . '</td>';
            echo '<td>' . $observacao . '</td>';
            echo '<td id="preco">' . $preco . '</td>';
            echo '<td>' . $nome . '</td>';
            echo '</tr>';
        endforeach;
        $_SESSION["pedido"]["id"] = $pedidoValue;
    } else {
        echo "erro";
    }
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}
