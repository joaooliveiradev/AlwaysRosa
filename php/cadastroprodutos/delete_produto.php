<?php
try {
   include '../conexao.php';
   $id = $_GET['id'];
   $sql = $conexao->prepare('UPDATE produtos set status_produto = 1 WHERE idprodutos=:idprodutos');
   $sql->bindValue(':idprodutos', $id);
   $sql->execute();
   header('Location: ../../admin/cadastroproduto.php');
} catch (PDOException $e) {
  echo "Erro " . $e->getMessage();
}
