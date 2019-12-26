<?php
    include('../../conexao.php');
    $selectMesaAtual = $_POST['mesaAtual'];
    $selectMesaNova = $_POST['mesaNova'];
    try {
        $stmt = $conexao->prepare("SELECT * FROM mesa WHERE numero = :mesaAtual or numero = :mesaNova");
        $stmt->bindValue(':mesaAtual', $selectMesaAtual);
        $stmt->bindValue(':mesaNova', $selectMesaNova);
        $stmt->execute();
        if($stmt->rowCount()){
            $stmt2 = $conexao->prepare("UPDATE mesa set status = 0 where numero = :mesaAtual");
            $stmt2->bindValue(':mesaAtual', $selectMesaAtual);
            $stmt2->execute();
            if($stmt2->rowCount()){
                $stmt3 = $conexao->prepare("UPDATE mesa set status = 1 where numero = :mesaNova");
                $stmt3->bindValue(':mesaNova', $selectMesaNova);
                $stmt3->execute();
                header("location: ../../../garcom/mudarmesa.php?success=1");
            }
        };
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }

?>