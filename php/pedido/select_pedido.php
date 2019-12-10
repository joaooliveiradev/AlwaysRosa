<?php
session_start();
include '../php/conexao.php';
error_reporting(0);
$idpedido = $_SESSION["pedido"]["id"];
$idcategoria = $_SESSION["categoria"]["id"];
$idproduto = $_SESSION["produto"]["id"];
$observacao = $_SESSION["observacao"];

try {
    $stmt = $conexao->prepare("SELECT itens.iditens,itens.preco,itens.observacao,produtos.descricao,categoria.nome FROM produtos inner join itens ON produtos.idprodutos = itens.id_produtos_fk inner join categoria on produtos.categoria_idcategoria = categoria.idcategoria where id_pedido = :idpedido");
    $stmt->bindValue(':idpedido', $idpedido);
    if ($stmt->execute()) {
        foreach ($stmt as $res) :
            extract($res);
            echo '<tr>';
            echo '<td>' . $idpedido. '</td>';
            echo '<td>' . $nome . '</td>';
            echo '<td>' . $descricao . '</td>';
            echo '<td>' . $observacao . '</td>';
            echo '<td>' . $preco . '</td>';
            echo '<td>';
            echo "<a href=\"../garcom/produtos.php?id=$iditens.\"><i class=\"material-icons blue-text accent-4\"> edit </i> </a>";
            echo "<a href=\"../php/pedido/delete_pedido.php?id=$iditens.\"><i class=\"material-icons red-text\"> clear </i> </a>";
            echo '</td>';
            echo '</tr>';
        endforeach;
    } else {
        echo "Erro: Não foi possível recuperar os dados do banco de dados";
    }
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}
