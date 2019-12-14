<?php
    session_start();
    error_reporting(0);
    if (isset($_SESSION['cargo'])) {
        $cargo = $_SESSION['cargo'];
        if ($cargo === "3") {
            $cargoName = "Administrador";
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
    <title>AlwaysRosa - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/admin.css">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link href="../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <ul id="slide-out" class="sidenav" style="width:235px!important">
            <li>
                <div class="user-view" style="padding: 32px 0px 0;">
                    <a style="float:left;" href="#user"><img style="width: 80px!important; height: 80px!important;" class="circle" src="../img/iconAdmin.png"></a>
                    <a style="padding-top: 17px; display: inline-block;" href="#name"><span class="black-text name" style="font-size: 17px!important;">Olá <?php echo $cargoName?></span></a>

                </div>
            </li>
            <a href="../php/actions/logout.php" style="color: black; color: black;font-size: 18px;padding-top: 12px; display: block; text-align: center;padding: 0px 67px; font-weight: 600" href="#!"><i style="float: left;     position: absolute;
    right: 130px; font-weight: 600" class="material-icons seta">keyboard_backspace</i>Sair</a>
        </ul>

        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>

        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../img/logo.png" /></a>
        </div>

    </nav>










    <h1 class="titulo">Painel de Controle</h1>

    <div class="container">
        <div class="row">
            <div class="col s12 painel">
                <!-- BOX 3 -->

                <div class="col s4 box3">
                    <i class="material-icons boxicon3">category</i>
                    <span class="boxtitulo3"><a href="insertCategory/">Cadastrar Categoria</a></span>
                </div>

                <!-- BOX  -->

                <div class="col s4 box">
                    <i class="material-icons boxicon">add_shopping_cart</i>
                    <span class="boxtitulo"><a href="insertProducts/">Cadastro Produto</a></span>
                </div>

                <!-- BOX 2 -->


                <div class="col s4 box2">
                    <i class="material-icons boxicon2">border_all</i>
                    <span class="boxtitulo2"><a href="insertTable/">Cadastrar Mesa</a></span>
                </div>

                <!-- BOX 8 -->

                <div class="col s4 box8">
                    <i class="material-icons boxicon9">computer</i>
                    <span class="boxtitulo8"><a href="insertPositions/">Cadastrar Cargos</a></span>
                </div>

                <!-- BOX 4 -->

                <div class="col s4 box4">
                    <i class="material-icons boxicon4">group_add</i>
                    <span class="boxtitulo4"><a href="insertColaborator/">Cadastro Funcionário</a></span>
                </div>

                <!-- BOX 7 -->

                <div class="col s4 box7">
                    <i class="material-icons boxicon7">computer</i>
                    <span class="boxtitulo7"><a href="waiter/">Tela Garçom</a></span>
                </div>

                <!-- BOX 8 -->

                <div class="col s4 box8">
                    <i class="material-icons boxicon8">computer</i>
                    <span class="boxtitulo8"><a href="kitchen/">Tela Cozinha</a></span>
                </div>

                <!-- BOX 5 -->

                <div class="col s4 box5">
                    <i class="material-icons boxicon5">computer</i>
                    <span class="boxtitulo5"><a href="cashier/">Tela Caixa</a></span>
                </div>

                <!-- BOX 6 -->

                <div class="col s4 box6">
                    <i class="material-icons boxicon6">assessment</i>
                    <span class="boxtitulo6"><a href="resumeSeller/">Resumo de Vendas</a></span>
                </div>

                <div>
                </div>
            </div>
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