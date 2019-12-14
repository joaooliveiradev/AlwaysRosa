<?php
session_start();
error_reporting(0);

if (isset($_SESSION['cargo'])) {
    $cargo = $_SESSION['cargo'];
    if ($cargo === "2") {
        $cargoName = "Garçom";
    } else {
        readfile('error.php');
        die();
    }
} else {
    readfile('error.php');
    die();
}


?>

<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - Garçom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/garcom.css">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link href="../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <ul id="slide-out" class="sidenav" style="width:235px!important">
            <li>
                <div class="user-view" style="padding: 32px 12px 0;">
                    <a style="float:left;" href="#user"><img  class="circle" src="../img/iconGarcom.png"></a>
                    <a style="padding-top: 17px; display: inline-block;" href="#name"><span class="black-text name" style="margin-left: 20px; margin-top: 9px!important; font-size: 18px!important;">Olá <?php echo $cargoName ?></span></a>

                </div>
            </li>
            <a href="../php/actions/logout.php" style="color: black; color: black;font-size: 18px;padding-top: 12px; display: block; text-align: center;padding: 0px 67px; font-weight: 600" href="#!"><i style="float: left;     position: absolute;
    right: 130px; font-weight: 600; padding-right: 10px!important;" class="material-icons seta">keyboard_backspace</i>Sair</a>
        </ul>

        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>

        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Controle Garçom</h1>

    <div class="container">
        <div class="row">
            <div class="col s12 painel">
                <!-- BOX 1 -->

                <div class="col s4 box">
                    <i class="material-icons boxicon">shopping_cart</i>
                    <span class="boxtitulo"><a href="pedidos.php">Pedidos</a></span>
                </div>

                <!-- BOX 2 -->

                <div class="col s4 box2">
                    <i class="material-icons boxicon2">add_shopping_cart</i>
                    <span class="boxtitulo2"><a href="pedido.php">Novo Pedido</a></span>
                </div>

                <div class="col s4 box2">
                    <i class="material-icons boxicon2">add_shopping_cart</i>
                    <span class="boxtitulo2"><a href="pedidosfinalizados.php">Pedidos Finalizados</a></span>
                </div>
            </div>
        </div>
    </div>

    <!--Import JQUERY-->
    <script src="../materialize/jquery/jquery-3.3.1.min.js"></script>

    <!--Import MATERIALIZE.JS-->
    <script src="../materialize/js/materialize.min.js"></script>

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

        $(document).ready(function() {
            $('.sidenav').sidenav();
        });
    </script>
</body>

</html>