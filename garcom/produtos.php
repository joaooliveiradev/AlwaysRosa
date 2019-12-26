<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection" />



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - Selecionar Produtos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/produto.css">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link href="../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Pedido</h1>

    <div class="container">
        <div class="row">


            <div class="col s12 painel">
                <h1 class="titulopainel">Anotando o Pedido!</h1>


                <form id="boxform" method="POST" action="../php/produtos/insert_produto.php">
                    <div id="box" class="col s12 box">
                        <?php
                        session_start();
                        error_reporting(0);
                        include '../php/conexao.php';
                        $idpedido = $_SESSION["pedido"]["id"]
                        ?>
                        <h1 class="titulocomanda">Comanda: <?= $idpedido ?></h1>
                        <h1 class="titulobox">Selecione a categoria</h1>

                        <?php

                        error_reporting(0);
                        include '../php/conexao.php';
                        $id = $_GET['id'];
                        $stmt = $conexao->prepare("SELECT * FROM itens WHERE iditens=:id");
                        $stmt->bindValue(':id', $id);
                        $stmt->execute();
                        $data = $stmt->fetchAll();
                        extract($data[0]);

                        ?>
                        <input value="<?= $id ?>" name="id" type="text" class="validate inputlogin" style="display: none!important" readonly>
                        <select name="selectCategoria">
                            <?php include_once('../php/produtos/select_categoria.php') ?>
                        </select>
                        <div class="button-center">
                            <a id="boxbutton" class="btn waves-effect waves-light button">Selecionar</a>
                        </div>
                    </div>
                    <div id="box2" class="col s12 box2">
                        <h1 class="titulobox">Selecione o Produto</h1>
                        <select id="selectProduto" name="selectProduto">

                        </select>
                        <div class="row" style="margin:0!important;">
                            <div class="row" style="margin:0!important;">
                                <div class="input-field col s12">
                                    <h1 class="titulobox" style="padding-top: 0px;padding-bottom: 11px;">Observação: </h1>
                                    <textarea name="observacao" id="textarea1" class="materialize-textarea "></textarea>

                                </div>
                            </div>
                        </div>

                        <div id="box3" class="col s12 box3">

                        </div>


                        <div class="button-center">
                            <a id="voltar" class="waves-effect waves-light btn button" style="margin-right: 15px!important">
                                Voltar
                            </a>
                            <button class="btn  waves-light button">Enviar pedido</button>
                        </div>
                    </div>
                </form>

            </div>


        </div>

    </div>








    <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/produto.js"></script>
    <!--Import JQUERY-->
    <script type="text/javascript" src="../materialize/jquery/jquery-3.3.1.min.js"></script>

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setInterval(async function() {
                const data = await (await fetch('../php/garcom/verifica_pedidos.php')).json();

                for (const pedido in data) {
                    M.toast({
                        html: `O ${data[pedido][0]} da mesa ${data[pedido][1]} foi finalizado.`,
                        classes: 'red white-text',
                        displayLength: Infinity
                    })
                }
            }, 2000);
        })
    </script>


</body>

</html>