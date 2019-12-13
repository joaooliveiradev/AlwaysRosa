<?php
    include '../../php/conexao.php';
    try{
        $stmt = $conexao->prepare("SELECT usuario.*, cargo.nome_cargo FROM usuario INNER JOIN cargo ON usuario.id_cargo = cargo.id_cargo");
        if ($stmt->execute()) {
            foreach ($stmt as $res) :
                extract($res);
                echo '<tr>';
                echo '<td>' . $id . '</td>';
                echo '<td>' . $login . '</td>';
                echo '<td>' . $senha . '</td>';
                echo '<td>' . $nome_cargo . '</td>';
                echo '<td>';
                echo "<a href=\"../../php/funcionario/form_updatefuncionario.php?id=$id.\"><i class=\"material-icons blue-text accent-4\"> edit </i> </a>";
                echo "<a href=\"../../php/funcionario/delete_funcionario.php?id=$id.\"><i class=\"material-icons red-text\"> clear </i> </a>";
                echo '</td>';
                echo '</tr>';
            endforeach;
        }
    } catch (PDOexception $erro){
        echo "Erro: " .$erro->getMessage();
    }

?>