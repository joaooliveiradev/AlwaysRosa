<?php
session_start();
include '../../conexao.php';
$idcategoria = $_POST['selectCategoria'];
$idproduto = $_POST['selectProduto'];
$observacao = $_POST['observacao'];
$iditens = $_POST['id'];
$idpedido = $_SESSION["pedido"]["id"];

try {
    $stmt = $conexao->prepare("SELECT * from itens where id_pedido = :idpedido");
    $stmt->bindValue(':idpedido', $idpedido);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $stmt4 = $conexao->prepare("SELECT preco FROM produtos where idprodutos = :id");
        $stmt4->bindValue(':id', $idproduto);
        $stmt4->execute();
        $data = $stmt4->fetchAll();
        extract($data[0]);
        if (empty($iditens)) {
            $stmt5 = $conexao->prepare("INSERT INTO itens (preco,observacao,id_produtos_fk,id_pedido) VALUES (:preco,:observacao,:idproduto,:idpedido)");
            $stmt5->bindValue(':preco', $preco);
            $stmt5->bindValue(':observacao', $observacao);
            $stmt5->bindValue(':idproduto', $idproduto);
            $stmt5->bindValue(':idpedido', $idpedido);
            $stmt5->execute();
            header('location: ../../../admin/waiter/conferirpedido.php');
        } else {
            $stmt = $conexao->prepare("UPDATE itens SET preco = :preco ,observacao = :observacao, id_produtos_fk = :idproduto where iditens = :iditens");
            $stmt->bindValue(':preco', $preco);
            $stmt->bindValue(':observacao', $observacao);
            $stmt->bindValue(':idproduto', $idproduto);
            $stmt->bindValue(':iditens', $iditens);
            $stmt->execute();
            header('location: ../../../admin/waiter/conferirpedido.php');
        }
    } else {
        try {
            $stmt3 = $conexao->prepare("SELECT descricao,preco FROM produtos where idprodutos = :id");
            $stmt3->bindValue(':id', $idproduto);
            if ($stmt3->execute()) {
                $data = $stmt3->fetchAll();
                extract($data[0]);
                $stt = $conexao->prepare("INSERT INTO itens (preco,observacao,id_produtos_fk,id_pedido) VALUES (:preco,:observacao,:idproduto,:idpedido)");
                $stt->bindValue(':preco', $preco);
                $stt->bindValue(':observacao', $observacao);
                $stt->bindValue(':idproduto', $idproduto);
                $stt->bindValue(':idpedido', $idpedido);
                $stt->execute();
                $_SESSION["categoria"]["id"] = $idcategoria;
                $_SESSION["produto"]["id"] = $idproduto;
                $_SESSION["observacao"] = $observacao;
                $_SESSION["preco"] = $preco;
                header('location: ../../../admin/waiter/conferirpedido.php');
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}
