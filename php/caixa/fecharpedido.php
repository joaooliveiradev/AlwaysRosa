<?php
//cria a sessao
session_start();
$idpedido = $_SESSION["pedido"]["id"];
include '../conexao.php';
//pegando os dados vindo do ajax fechamentopedido para fazer insert

$selectForma1 = $_POST['selectForma1'];
$selectForma2 = $_POST['selectForma2'];
$selectForma3 = $_POST['selectForma3'];
$inputValue1 = $_POST['inputValue1'];
$inputValue2 = $_POST['inputValue2'];
$inputValue3 = $_POST['inputValue3'];
try {
    $stmt = $conexao->prepare("INSERT INTO pedido_forma_pagamento (pedido_id,forma_pagamento_id,valor) VALUES (:idpedido,:formapagamento,:valor),(:idpedido,:formapagamento2,:valor2), (:idpedido,:formapagamento3,:valor3)");
    $stmt->bindValue(':idpedido', $idpedido);
    $stmt->bindValue(':formapagamento', $selectForma1);
    $stmt->bindValue(':formapagamento2', $selectForma2);
    $stmt->bindValue(':formapagamento3', $selectForma3);
    $stmt->bindValue(':valor', $inputValue1);
    $stmt->bindValue(':valor2', $inputValue2);
    $stmt->bindValue(':valor3', $inputValue3);
    $stmt->execute();
    if($stmt->rowCount()){
         //select para pegar o id da mesa com o id do pedido para fazer o insert do status na mesa em questão
        $stmt2 = $conexao->prepare("SELECT pedido.idpedido,pedido.idmesa from mesa inner join pedido on pedido.idmesa = mesa.idmesa where idpedido = :idpedido");
        $stmt2->bindValue(':idpedido', $idpedido);
        $stmt2->execute();
        $data = $stmt2->fetchAll();
        extract($data[0]);
        if($stmt2->rowCount()){
        $stmt3 = $conexao->prepare("UPDATE mesa SET status=:status WHERE idmesa=:idmesa");
        $stmt3->bindValue(':idmesa', $idmesa);
        $stmt3->bindValue(':status', 0);
        $stmt3->execute();    
    //libera toda as seções para efetuar novos fechamentos
        session_unset($_SESSION["pedido"]["id"]);
     
       
        }
    }

} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}






?>