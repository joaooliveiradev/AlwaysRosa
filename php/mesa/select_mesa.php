<?php
    include '../php/conexao.php';
        try {
            $stmt = $conexao->prepare("SELECT * FROM mesa");
            if ($stmt->execute()) {
                foreach ($stmt as $res) :
                    extract($res);
                    echo '<tr>';
                    echo '<td>' . $idmesa . '</td>';
                    echo '<td>' . $numero . '</td>';
                    echo '<td>';
                    echo "<a href=\"../php/mesa/form_updatemesa.php?id=$idmesa.\"><i class=\"material-icons  blue-text accent-4\"> edit </i> </a>";
                    echo '</td>';
                    echo '</tr>';
                endforeach;
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    ?>