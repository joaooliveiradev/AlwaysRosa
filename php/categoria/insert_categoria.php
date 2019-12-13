<?php 
// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$categoria = $_POST["categoria"];
include '../../php/conexao.php';
$stmt = $conexao->prepare("INSERT INTO categoria (nome) VALUES (?)");
$stmt->bindParam(1, $categoria);
if ($stmt->execute()) {
header('location: ../../admin/insertCategory/');
} else {
throw new PDOException("Erro: Não foi possível executar a declaração sql");
}
}
