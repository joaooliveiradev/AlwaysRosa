<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - Conferir Pedido - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/conferirpedido.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" />
    <link href="../../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Pedido</h1>

    <div class="container">
        <div class="row">
            <div class="col s12 painel">
                <h1 class="titulopainel">Conferindo o seu Pedido!</h1>
                <form method="POST">
                    <table class="striped centered responsive-table">
                        <thead>
                            <tr>
                                <th>Comanda</th>
                                <th>Nome da Categoria</th>
                                <th>Nome do Produto</th>
                                <th>Observação</th>
                                <th>Preço</th>
                                <th>Operações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php include_once('../../php/pedido/admin/select_pedido.php') ?>
                        </tbody>
                    </table>

                    <div class="button-center">
                        <a href="produtos.php" class="waves-effect waves-light btn botaoMais">
                            Adicionar mais itens a comanda
                        </a>
                        <a href="pedidoenviado.php" class="waves-effect waves-light btn botaoEnviar">
                            Enviar Pedido
                        </a>


                    </div>

                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="../../jquery/jquery-3.3.1.min.js"></script>
    <!--Import JQUERY-->
    <script type="text/javascript" src="../../materialize/jquery/jquery-3.3.1.min.js"></script>

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setInterval(async function() {
                const data = await (await fetch('../../php/garcom/verifica_pedidos.php')).json();

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