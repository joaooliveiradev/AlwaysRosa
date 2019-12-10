    <?php
    // Bloco que realiza o papel do Read - recupera os dados e apresenta na tela
    include '../php/conexao.php';
    try {
        $stmt = $conexao->prepare("SELECT * FROM categoria");
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo  "<option value = " . $rs->idcategoria . ">" . $rs->nome . "</option>";
            }
            echo "</select>";
        } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
