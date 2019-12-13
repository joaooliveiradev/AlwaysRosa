<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Always - Categoria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/categoria.css">
    <link rel="shortcut icon" href="../../img/favicon.ico"/>
    <link href="../../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Cadastro de Categoria</h1>

    <div class="container">
        <div class="row">
            <div class="painel">
                <form action="../../php/categoria/insert_categoria.php" method="POST">
                    <h1 class="titulo2">Digite o nome da Categoria</h1>
                    <div class="input-field col s12">
                        <input placeholder="Digite o nome da Categoria" type="text" name="categoria" class="validate inputcategoria">
                    </div>

                    <div class="col s12 botao">
                        <div class="button-center">
                            <button class="btn waves-effect waves-light button" type="submit" name="action">Cadastrar</button>
                            <a href="../" class="waves-effect waves-light btn botaoVoltar">
                                Voltar
                            </a>
                        </div>
                    </div>

                    <table class="striped centered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome da Categoria</th>
                                <th>Operações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php include_once('../../php/categoria/select_categoria.php') ?>
                        </tbody>
                    </table>


                </form>
            </div>
        </div>
    </div>






    <script type="text/javascript" src="../../jquery/jquery-3.3.1.min.js"></script>

    <!--Import JQUERY-->
    <script type="text/javascript" src="../../materialize/jquery/jquery-3.3.1.min.js"></script>

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>





</body>

</html>