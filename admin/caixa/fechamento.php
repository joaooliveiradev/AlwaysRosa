<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - Fechamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/caixa.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" />
    <link href="../../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Fechamento de Comanda</h1>

    <div class="container">
        <div class="row">
            <form id="myForm" method="post" action="../../php/caixa/controller.php">
                <div class="col s12 painel">




                    <div class="row" style="padding: 0 10px;">


                        <div class="col s6 m3 l3">
                            <span class="titulocomanda">Comanda: </span>
                        </div>
                        <div class="input-field col s6 m3 l3">
                            <input required name="comanda" type="text" class="validate inputcomanda">
                        </div>

                        <div class="col s6 m3 l3">
                            <span class="titulocliente">Clientes Mesa: </span>
                        </div>
                        <div class="input-field col s6 m3 l3">
                            <input required name="clientemesa" type="text" class="validate inputcomanda">
                        </div>

                    </div>

                    <div class="row" style="padding: 0 10px;">
                        <div class="col s6 m3 l3">
                            <span class="titulocomanda">Couver: </span>
                        </div>
                        <div class="input-field col s6 m3 l3">
                            <input id="couver" required name="couver" placeholder="S/N" onkeyup="this.value = this.value.toUpperCase()" ; type="text" class="validate inputcomanda">
                        </div>

                        <div class="col s6 m3 l3">
                            <span class="titulocliente">Taxa Serviço: </span>
                        </div>
                        <div class="input-field col s6 m3 l3">
                            <input id="servico" required name="servico" placeholder="S/N" onkeyup="this.value = this.value.toUpperCase()" ; type="text" class="validate inputcomanda">

                        </div>
                    </div>
                    <div class="button-center">

                        <a href="index.php" class="waves-effect waves-light btn botaoVoltar">
                            Voltar
                        </a>

                        <input type="button" value="Fechamento" id="botao" class="btn  waves-light button" />


                    </div>



                </div>
        </div>
        </form>
    </div>
    </div>


    <script type="text/javascript" src="../../jquery/jquery-3.3.1.min.js"></script>

    <!--Import JQUERY-->
    <script type="text/javascript" src="../../materialize/jquery/jquery-3.3.1.min.js"></script>

    <script type="text/javascript" src="../../js/caixa.js"></script>
    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>


</body>

</html>