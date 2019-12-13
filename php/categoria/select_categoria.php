<?php
    include '../../php/conexao.php';
    try{
        $stmt = $conexao->prepare("SELECT * FROM categoria where status_categoria = 0");
        if ($stmt->execute()) {
            foreach ($stmt as $res) :
                extract($res);
                echo '<tr>';
                echo '<td>' . $idcategoria . '</td>';
                echo '<td>' . $nome . '</td>';
                echo '<td>';
                echo "<a href=\"../../php/categoria/form_updatecategoria.php?id=$idcategoria.\"><i class=\"material-icons blue-text accent-4\"> edit </i> </a>";
                echo "<a href=\"../../php/categoria/delete_categoria.php?id=$idcategoria.\"><i class=\"material-icons red-text\"> clear </i> </a>";
                echo '</td>';
                echo '</tr>';
            endforeach;
        }
    } catch (PDOexception $erro){
        echo "Erro: " .$erro->getMessage();
    }
