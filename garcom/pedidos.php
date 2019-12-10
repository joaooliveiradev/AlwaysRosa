<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - Pedido</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/pedidos.css">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link href="../css/icon.css" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Pedidos</h1>

    <div class="container">
        <div class="row">
            <form action="#">
                <div class="col s12 painel">
                    <h1 class="titulopainel">Ver Pedidos</h1>
                    <div class="input-field col s12">
                        <input id="inputComanda" placeholder="Digite o Nº da Comanda" type="number" class="validate inputcomanda">
                    </div>

                    <table id="table" class="striped centered responsive-table">
                        <thead>
                            <tr>
                                <th>Comanda</th>
                                <th>Produto</th>
                                <th>Observação</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>


                    <!--BOTAO-->
                    <div class="col s12 botao">

                        <div class="col s12 button-center">
                            <button type="button" id="btnVerificarComanda" class="btn waves-effect waves-light botaoComanda">
                                Verificar Comanda
                            </button>

                        </div>
                        <div id="btnmais" class="col s12 button-center2">
                            <a style="margin:0!important;" href="produtos.php" class="waves-effect waves-light btn botaoVoltar">
                                Adicionar mais produtos à comanda
                            </a>
                        </div>

                        <div class="col s12 button-center3">
                            <a href="garcom.php" class="waves-effect waves-light btn botaoVoltar">
                                Voltar
                            </a>
                        </div>

                    </div>


                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>

    <!--Import JQUERY-->
    <script type="text/javascript" src="../materialize/jquery/jquery-3.3.1.min.js"></script>

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>

    <script type="text/javascript" src="../js/pedidos.js"></script>

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