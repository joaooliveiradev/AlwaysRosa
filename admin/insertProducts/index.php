<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - Garçom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/cadastroproduto.css">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link href="../../css/icon.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Cadastro de Produto</h1>

    <div class="container">
        <div class="row">
            <form action="../../php/cadastroprodutos/insert_produto.php" method="post">
                <div class="col s12 painel">
                    <span class="tituloinput">Nome do Produto </span>
                    <div class="col s12">
                        <input name="txtdescricao" placeholder="Digite o nome do Produto" id="first_name" type="text" class="validate inputproduto">
                    </div>
                    <span class="tituloinput2">Selecione a categoria</span>
                    <div class="col s12 ">
                        <select name="categoria" class="browser-default">
                            <?php include_once('../../php/cadastroprodutos/select_categoria.php') ?>
                        </select>

                    </div>
                    <span class="tituloinput3">Preço do Produto</span>

                    <div class="col s12">
                        <input name="txtpreco" placeholder="Digite o preço do Produto" id="first_name" type="text" class="validate inputproduto">
                    </div>

                    <div class="button-center">
                        <button class="btn waves-effect waves-light button" type="submit" name="action">Cadastrar</button>
                        <a href="../" class="waves-effect waves-light btn botaoVoltar">
                            Voltar
                        </a>
                    </div>

                    <table class="striped responsive-table centered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome da Categoria</th>
                                <th>Nome do Produto</th>
                                <th>Preco</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include_once('../../php/cadastroprodutos/select_produto.php') ?>
                        </tbody>
                    </table>

                </div>
            </form>
        </div>
    </div>

















    <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>

    <!--Import JQUERY-->
    <script type="text/javascript" src="../materialize/jquery/jquery-3.3.1.min.js"></script>

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>





</body>

</html>