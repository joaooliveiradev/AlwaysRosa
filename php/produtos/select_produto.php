<?php
include '../conexao.php';
$selectValue = $_POST['idcategoria'];
try {
    $stmt = $conexao->prepare("SELECT idprodutos,descricao,preco FROM produtos where categoria_idcategoria = :id and status_produto = 0");
    $stmt->bindValue(':id', $selectValue);
    if ($stmt->execute()) {
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
            echo "<option value='$rs->idprodutos'>";
            echo "$rs->descricao R$$rs->preco";
            echo "</option>";
        }
    } else {
        echo "Erro: Não foi possível recuperar os dados do banco de dados";
    }
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}
