<?php
session_start();
error_reporting(0);

if (isset($_SESSION['cargo'])) {
    $cargo = $_SESSION['cargo'];
    if ($cargo === "4") {
        $cargoName = "Cozinheiro";
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
    <title>Always - Cozinha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/cozinha.css">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link href="../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <ul id="slide-out" class="sidenav" style="width:235px!important">
            <li>
                <div class="user-view" style="padding: 32px 12px 0;">
                    <a style="float:left;" href="#user"><img class="circle" src="../img/iconChef.png"></a>
                    <a style="padding-top: 17px; display: inline-block;" href="#name"><span class="black-text name" style="margin-left: 12px; margin-top: 9px!important; font-size: 18px!important;">Olá <?php echo $cargoName ?></span></a>

                </div>
            </li>
            <a href="../php/actions/logout.php" style="color: black; color: black;font-size: 18px;padding-top: 12px; display: block; text-align: center;padding: 0px 67px; font-weight: 600" href="#!"><i style="float: left; position: absolute; right: 130px; font-weight: 600; padding-right: 10px!important;" class="material-icons seta">keyboard_backspace</i>Sair</a>
        </ul>

        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Cozinha</h1>


    <form action="#">
        <table class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Pedido</th>
                    <th>Observação</th>
                    <th>Horário</th>
                    <th>Status</th>

                </tr>
            </thead>

            <tbody>
                <?php include_once("../php/cozinha/select_cozinha.php"); ?>
            </tbody>
        </table>
    </form>










    <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>

    <!--Import JQUERY-->
    <script type="text/javascript" src="../materialize/jquery/jquery-3.3.1.min.js"></script>

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
        });
    </script>



</body>

</html>