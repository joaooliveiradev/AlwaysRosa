<?php 
// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mesa = $_POST["txtmesa"];
        
include 'conexao.php';
try {
$stmt = $conexao->prepare("INSERT INTO mesa (numero) VALUES (?)");
$stmt->bindParam(1, $mesa);

if ($stmt->execute()) {
if ($stmt->rowCount() > 0) { 
header("location:../admin/cadastromesa.php");
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
