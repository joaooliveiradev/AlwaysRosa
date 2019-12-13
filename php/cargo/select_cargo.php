<?php
    include '../../php/conexao.php';
        try {
            $stmt = $conexao->prepare("SELECT * FROM cargo where status_cargo = 0");
            if ($stmt->execute()) {
                foreach ($stmt as $res) :
                    extract($res);
                    echo '<tr>';
                    echo '<td>' . $id_cargo . '</td>';
                    echo '<td>' . $nome_cargo . '</td>';
                    echo '<td>';
                    echo "<a href=\"../php/cargo/form_updatecargo.php?id=$id_cargo.\"><i class=\"material-icons  blue-text accent-4\"> edit </i> </a>";
                    echo "<a href=\"../php/cargo/delete_cargo.php?id=$id_cargo.\"><i class=\"material-icons red-text\"> clear </i> </a>";
                    echo '</td>';
                    echo '</tr>';
                endforeach;
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    ?>