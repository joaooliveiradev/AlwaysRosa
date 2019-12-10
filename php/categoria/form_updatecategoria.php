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
    <title>Always - Atualizar Categoria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/categoria.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" />
    <link href="../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Atualizar Categoria</h1>

    <div class="container">
        <div class="row">
            <div class="painel" style="height: 300px!important;">
                <form action="update_categoria.php" method="post">
                    <h1 class="titulo2" style="text-align:justify!important; padding-left: 10px!important">ID: </h1>
                    <?php
                    include '../../php/conexao.php';
                    $id = $_GET['id'];
                    $stmt = $conexao->prepare("SELECT * FROM categoria WHERE idcategoria=:id");
                    $stmt->bindValue(':id', $id);
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    extract($data[0]);
                    ?>
                    <div class="input-field col s12">
                        <input value="<?= $idcategoria ?>" name="idcategoria" placeholder="Digite o Nº da Mesa" type="text" class="validate inputcategoria" readonly>
                    </div>
                    <h1 class="titulo2" style="text-align:justify!important; padding-left: 10px!important">Nome da Categoria:</h1>
                    <div class="input-field col s12">
                        <input value="<?= $nome ?>" name="nomecategoria" placeholder="Digite o Nome da Categoria" type="text" class="validate inputcategoria">
                    </div>

                    <div class="col s12 botao">
                        <div class="button-center">
                            <button class="btn waves-effect waves-light button" type="submit" name="action">Atualizar</button>
                            <a href="../../admin/cadastrocategoria.php" class="waves-effect waves-light btn botaoVoltar">
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