<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection" />


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - GarcomADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/garcom.css">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link href="../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Tela do Garçom</h1>

    <div class="container">
        <div class="row">
            <div class="col s12 painel">
                <!-- BOX 1 -->

                <div class="col s4 box">
                    <i class="material-icons boxicon">shopping_cart</i>
                    <span class="boxtitulo"><a href="../garcom/pedidos.php">Pedidos</a></span>
                </div>

                <!-- BOX 2 -->

                <div class="col s4 box2">
                    <i class="material-icons boxicon2">add_shopping_cart</i>
                    <span class="boxtitulo2"><a href="../garcom/pedido.php">Novo Pedido</a></span>
                </div>

                <div class="col s4 box2">
                    <i class="material-icons boxicon2">add_shopping_cart</i>
                    <span class="boxtitulo2"><a href="pedidosandamento.php">Pedidos Finalizados</a></span>
                </div>

                <div class="col s12 button-center">
                    <a href="admin.php" class="waves-effect waves-light btn botaoVoltar">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>

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