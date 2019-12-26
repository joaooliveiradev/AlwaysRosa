
<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - Mudança de Mesa</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/mudarmesa.css">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link href="../css/icon.css" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Mudança de Mesa!</h1>

    <div class="container">
        <div class="row">
            <div class="col s12 painel">
                <h1 class="titulopainel">Selecione a mesa atual e a mesa que deseja. </h1>
                <form action="../php/garcom/mudancamesa/mudarmesa.php" method="POST">
                    <div class="col s6">
                        <span class="mesaAtual">Selecione a Mesa Atual</span>
                        <select name="mesaAtual" class="browser-default">
                            <?php include_once('../php/garcom/mudancamesa/select_mesaOcupada.php') ?>
                        </select>
                    </div>
                    <div class="col s6">
                        <span class="mesaNova">
                            Selecione a Mesa Nova
                        </span>
                        <select name="mesaNova" class="browser-default">
                            <?php include_once('../php/garcom/mudancamesa/select_mesaLivre.php') ?>
                        </select>
                    </div>

                    <div class="col s12 button-center">
                        <button class="btn waves-effect waves-light button" type="submit">Confirmar!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>

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