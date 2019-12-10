<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Always - Atualizar Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/cadastroproduto.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" />
    <link href="../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Atualizar Produtos</h1>

    <div class="container">
        <div class="row">
            <div class="painel" style="height: 425px!important;">

                <form action="update_produto.php" method="post">
                    <h1 class="titulo1" style="text-align:justify!important; padding-left: 10px!important; padding-top: 10px!important;">ID: </h1>
                    <!--ID-->
                    <?php
                    include '../conexao.php';
                    $id = $_GET['id'];
                    $stmt = $conexao->prepare("SELECT * FROM produtos WHERE idprodutos=:idprodutos");
                    $stmt->bindValue(':idprodutos', $id);
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    extract($data[0]);

                    ?>
                    <div class="input-field col s12" style="width: 99.8%;">
                        <input value="<?= $id ?>" name="id" type="text" class="validate input" readonly>
                    </div>
                    <!--Nome do Produto-->
                    <h1 class="titulo1" style="text-align:justify!important; padding-left: 10px!important">Nome do Produto: </h1>
                    <div class="input-field col s12" style="width: 99.8%;">
                        <input value="<?= $descricao ?>" name="produto" type="text" class="validate input">
                    </div>

                    <!--Categoria-->
                    <h1 class="titulo1" style="text-align:justify!important; padding-left: 10px!important">Categoria: </h1>
                    <?php
                    include '../conexao.php';
                    $id = $_GET['id'];
                    $stmt = $conexao->prepare("SELECT idprodutos,descricao,preco,categoria.* from categoria inner join produtos on categoria.idcategoria = produtos.categoria_idcategoria WHERE idprodutos = :id");
                    $stmt->bindValue(':id', $id);
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    extract($data[0]);

                    ?>

                    <select name="categoria">
                        <?php
                        include '../conexao.php';
                        try {
                            $stmt = $conexao->prepare("SELECT * from categoria");
                            if ($stmt->execute()) {
                                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                    echo "<option value='$rs->idcategoria'>";
                                    echo "$rs->nome";
                                    echo "</option>";
                                }
                            } else {
                                echo "Erro: Não foi possível recuperar os dados do banco de dados";
                            }
                        } catch (PDOException $erro) {
                            echo "Erro: " . $erro->getMessage();
                        }


                        ?>
                    </select>

                    <h1 class="titulo1" style="text-align:justify!important; padding-left: 10px!important;padding-top:10px!important;">Preco:</h1>
                    <div class="input-field col s12" style="width: 99.8%;">
                        <input value="<?= $preco ?>" name="preco" type="text" class="validate input">
                    </div>

                    <div class="col s12 botao">
                        <div class="button-center">
                            <button class="btn waves-effect waves-light button" type="submit" name="action">Atualizar</button>
                            <a href="../../admin/cadastroproduto.php" class="waves-effect waves-light btn botaoVoltar">
                                Voltar
                            </a>
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div>

</body>

</html>