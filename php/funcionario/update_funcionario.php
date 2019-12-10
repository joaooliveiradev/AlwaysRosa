<?php
try {
    include '../../php/conexao.php';
    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
    $login = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
    $selectvalue = $_POST['selectCategoria'];
    $stmt = $conexao->prepare("UPDATE usuario SET login =:login, senha=:senha,id_cargo=:selectvalue WHERE id=:id");
    $stmt->bindValue(':login', $login);
    $stmt->bindValue(':senha', $senha);
    $stmt->bindValue(':selectvalue', $selectvalue);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    header('Location: ../../admin/cadastro.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
