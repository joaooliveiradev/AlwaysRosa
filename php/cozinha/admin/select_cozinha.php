<?php
include '../../php/conexao.php';
try {
    $stmt = $conexao->prepare("SELECT itens.iditens,produtos.descricao,itens.observacao,itens.id_produtos_fk,categoria.nome,data_hora FROM produtos inner join itens ON produtos.idprodutos = itens.id_produtos_fk inner join categoria on produtos.categoria_idcategoria = categoria.idcategoria where status_pedido = 0 and idcategoria != 4 ");
    if ($stmt->execute()) {
        foreach ($stmt as $res) :
            extract($res);
            echo '<tr>';
            echo '<td>' . $nome . '</td>';
            echo '<td>' . $descricao . '</td>';
            echo '<td>' . $observacao . '</td>';
            echo '<td>' . $data_hora . '</td>';
            echo '<td style="padding-top: 10px; padding-bottom: 8px">';
            echo "<a href=\"../../php/cozinha/admin/update_cozinha.php?id=$iditens.\" class='btn-floating btn-small waves-effect waves-light green iconebotao' ><i class='material-icons'>done</i></a> ";
            echo '</td>';
            echo '</tr>';
            echo '</td>';
            echo '</tr>';
        endforeach;
    }
} catch (PDOexception $erro) {
    echo "Erro: " . $erro->getMessage();
}
