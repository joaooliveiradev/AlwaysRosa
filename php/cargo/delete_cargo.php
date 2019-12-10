<?php
try {
   include '../conexao.php';
   $id = $_GET['id'];
   $sql = $conexao->prepare('UPDATE cargo set status_cargo = 1 WHERE id_cargo=:id');
   $sql->bindValue(':id', $id);
   $sql->execute();
   header('Location: ../../admin/cadastrocargo.php');
} catch (PDOException $e) {
  echo "Erro " . $e->getMessage();
}
