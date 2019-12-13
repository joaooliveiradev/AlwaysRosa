<?php
include '../../php/conexao.php';

try {
    $stmt = $conexao->prepare("SELECT idprodutos,descricao,preco,categoria.nome from categoria inner join produtos on categoria.idcategoria = produtos.categoria_idcategoria where status_produto = 0");
    if ($stmt->execute()) {
        foreach ($stmt as $res) :
            extract($res);
            echo '<tr>';
            echo '<td>' . $idprodutos . '</td>';
            echo '<td>' . $nome . '</td>';
            echo '<td>' . $descricao . '</td>';
            echo '<td>' . $preco . '</td>';
            echo '<td>';
            echo "<a href=\"../php/cadastroprodutos/delete_produto.php?id=$idprodutos.\"><i class=\"material-icons red-text\"> clear </i></a>";
            echo "<a href=\"../php/cadastroprodutos/form_updateproduto.php?id=$idprodutos.\"><i class=\"material-icons  blue-text accent-4\"> edit </i> </a>";
            echo '</td>';
            echo '</tr>';
        endforeach;
    }
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}
