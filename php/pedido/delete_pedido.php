<?php
try {
   include '../conexao.php';
   $id = $_GET['id'];
   $sql = $conexao->prepare('DELETE FROM itens WHERE iditens=:id');
   $sql->bindValue(':id', $id);
   $sql->execute();
   header('location: ../../garcom/conferirpedido.php');
} catch (PDOException $e) {
  echo "Erro " . $e->getMessage();
}
