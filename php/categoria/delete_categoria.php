<?php
try {
   include '../conexao.php';
   $id = $_GET['id'];
   $sql = $conexao->prepare('UPDATE categoria set status_categoria = 1 WHERE idcategoria=:id');
   $sql->bindValue(':id', $id);
   $sql->execute();
   header('Location: ../../admin/insertCategory/');
} catch (PDOException $e) {
  echo "Erro " . $e->getMessage();
}
