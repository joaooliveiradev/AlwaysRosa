<?php
    include '../php/conexao.php';
        try {
            $stmt = $conexao->prepare("SELECT * FROM mesa where status = 0");
            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<option value='$rs->numero'>";
                    echo "$rs->numero";
                    echo "</option>";
                }
            } else {
                echo "Erro: Não foi possível recuperar os dados do banco de dados";
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    ?>