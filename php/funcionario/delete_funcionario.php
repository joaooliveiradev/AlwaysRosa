<?php
try {
   include '../conexao.php';
   $id = $_GET['id'];
   $sql = $conexao->prepare('DELETE FROM usuario WHERE id=:id');
   $sql->bindValue(':id', $id);
   $sql->execute();
   header('Location: ../../admin/insertColaborator/');
} catch (PDOException $e) {
  echo "Erro " . $e->getMessage();
}
