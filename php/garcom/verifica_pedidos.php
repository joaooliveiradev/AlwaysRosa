<?php
include '../conexao.php';

try {
    $stmt = $conexao->prepare("SELECT iditens, p.descricao, mesa.numero FROM itens i INNER JOIN produtos p ON p.idprodutos = i.id_produtos_fk INNER JOIN pedido ON pedido.idpedido = i.id_pedido INNER JOIN mesa ON mesa.idmesa = pedido.idmesa WHERE status_pedido = '1' AND status_notificacao = '0'");
    $stmt->execute();

    if ($stmt->rowCount()) {
        foreach ($stmt as $iten) {
            extract($iten);
            $stmt = $conexao->prepare("UPDATE itens SET status_notificacao = '1' WHERE iditens = :iditens");
            $stmt->bindValue(':iditens', $iditens);
            $stmt->execute();

            $data[] = [$descricao, $numero];
        }

        echo json_encode($data);
    } else echo '[]';
} catch (PDOexception $erro) {
    echo "Erro: " . $erro->getMessage();
}
