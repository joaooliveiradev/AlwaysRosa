<?php
// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    //$nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    //$email = (isset($_POST["email"]) && $_POST["email"] != null) ? $_POST["email"] : "";
    //$celular = (isset($_POST["celular"]) && $_POST["celular"] != null) ? $_POST["celular"] : NULL;
    $descricao = $_POST["txtdescricao"];
    $categoria_idcategoria = $_POST["categoria"];
    $preco = $_POST["txtpreco"];


    include '../conexao.php';
    try {
        $stmt = $conexao->prepare("INSERT INTO produtos (descricao, categoria_idcategoria, preco) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $descricao);
        $stmt->bindParam(2, $categoria_idcategoria);
        $stmt->bindParam(3, $preco);


        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header("location:../../admin/cadastroproduto.php");
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}
