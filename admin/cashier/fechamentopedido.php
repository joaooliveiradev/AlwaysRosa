<?php
session_start();
$idpedido = $_SESSION["pedido"]["id"];
$clientemesa = $_SESSION["clientemesa"];
$couver = $_SESSION["couver"];
$servico = $_SESSION["servico"];
include '../../php/conexao.php';
try {
    $stmt = $conexao->prepare("SELECT SUM(preco) FROM itens WHERE id_pedido = :idpedido");
    $stmt->bindValue(':idpedido', $idpedido);
    $stmt->execute();
    $data = $stmt->fetch();
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}


?>
<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - Fechamento Pedido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/fechamentopedido.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" />
    <link href="../../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Fechamento Comanda</h1>

    <div class="container">
        <div class="row">

            <div class="col s12 painel">
                <div class="row" style="padding: 0 10px; margin-bottom: 0px">
                    <div class="col s6 m3 l3 ">
                        <span class="titulocomanda">Comanda: </span>
                    </div>
                    <div class="input-field col s6 m3 l3">
                        <input id="idpedido" value="<?= $idpedido ?>" name="comanda" type="text" class="validate input" readonly>
                    </div>
                    <div class="col s6 m3 l3">
                        <span class="totalconta">Total dos Pedidos: </span>
                    </div>
                    <div class="input-field col s6 m3 l3">
                        <input value="<?= $data[0] ?>" name="totalconta" type="text" class="validate input" readonly>
                    </div>
                </div>
                <?php
                if ($couver == "S") {
                    $valorcouver = 6.00;
                    $data[0] = number_format($data[0] + $valorcouver, 2);
                } else {
                    $valorcouver = 0.00;
                }
                if ($servico == "S") {
                    $valorservico = "10%";
                    $data[0] = number_format($data[0] * 1.10, 2);
                } else {
                    $valorservico = "0%";
                }
                ?>

                <div class="row" style="padding: 0 10px; margin-bottom: 0px">
                    <div class="col s6 m3 l3">
                        <span class="textotaxa">Taxas</span>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <input value="<?= $valorservico ?>" name="taxa" type="text" class="validate input" readonly>
                    </div>
                    <div class="col s6 m3 l3">
                        <span class="textotaxa">Couver:</span>
                    </div>
                    <div class="input-field col s6 m3 l3">
                        <input value="<?= number_format($valorcouver, 2) ?>" name="couver" type="text" class="validate input" readonly>
                    </div>

                    <div class="col s12 m3 l3">
                        <span class="formastitulo">Total da Conta: </span>
                    </div>
                    <div class="input-field col s12 m3 l3">
                        <input id="totaldaConta" value="<?= number_format($data[0], 2) ?>" name="total" type="text" class="validate input" readonly>
                    </div>


                    <div class="col s6 m3 l3">
                        <span class="textotaxa">Clientes Mesa:</span>
                    </div>
                    <div class="input-field col s6 m3 l3">
                        <input id="clientemesa" value="<?= $clientemesa ?>" name="couver" type="text" class="validate input" readonly>
                    </div>
                </div>


                <!--BOX 1 FORMA DE PAGAMENTO 1-->
                <div id="box1" class="row" style="padding: 0 10px;padding-bottom: 13px">
                    <div class="col s12 ">
                        <span class="titulopagamento">Selecione a forma de pagamento </span>
                    </div>

                    <div class=" col s6 m6 l6" id="box1">
                        <select id="selectForma1" name="selectForma1" class="browser-default">
                            <?php include('../../php/formaPagamento/select_formapagamento.php') ?>
                        </select>
                    </div>

                    <div class="col s6 m6 l6" id="input1">
                        <div class="col s12 m12 l12">
                            <input required id="forma1" name="forma1" placeholder="Valor" type="number" class="validate input">
                        </div>
                    </div>



                    <div class="col s12" id="botao1">
                        <div class="col s12 button-center">

                            <button id="btnforma1" class="btn waves-effect waves-light button formas">Adicionar mais uma forma</button>
                        </div>
                    </div>
                </div>

                <!--BOX 2 FORMA DE PAGAMENTO 2-->

                <div id="box2" class="row" style="padding: 0 10px;padding-bottom: 13px">

                    <div class=" col s5 m6 l6" id="select2">
                        <select id="selectForma2" name="selectForma2" class="browser-default">
                            <?php include('../../php/formaPagamento/select_formapagamento.php') ?>
                        </select>
                    </div>

                    <div class="col s5 m5 l5" id="input2">
                        <div class="col s12 m12 l12">
                            <input required id="forma2" name="forma2" placeholder="Valor" type="number" class="validate input">
                        </div>
                    </div>

                    <div id="deletarForm2" class="col s2 m1 l1" onclick="deletar2()">
                        <i class="material-icons red-text">clear</i>
                    </div>

                    <div class="col s12" id="botao2">
                        <div class="col s12 button-center">
                            <button id="btnforma2" class="btn waves-effect waves-light button formas">Adicionar mais uma forma</button>
                        </div>
                    </div>
                </div>

                <!--BOX 3 FORMA DE PAGAMENTO 3-->

                <div id="box3" class="row" style="padding: 0 10px;padding-bottom: 13px">

                    <div class=" col s5 m6 l6" id="select3">
                        <select id="selectForma3" name="selectForma3" class="browser-default">
                            <?php include('../../php/formaPagamento/select_formapagamento.php') ?>
                        </select>
                    </div>

                    <div class="col s5 m5 l5" id="input3">
                        <div class="col s12 m12 l12">
                            <input required id="forma3" name="forma3" placeholder="Valor" type="number" class="validate input">
                        </div>
                    </div>

                    <div id="deletarForm3" class="col s2 m1 l1" onclick="deletar3()">
                        <i class="material-icons red-text">clear</i>
                    </div>


                </div>



                <div class="col s12 button-center">
                    <button id="calcular" class="btn waves-effect waves-light button calcular" type="submit">Calcular</button>
                </div>

                <div class="row" id="box" style="padding: 0 10px;">


                    <div class="input-field col s6 m3 l3">
                        <span class="formastitulo">Troco: </span>
                    </div>
                    <div class="input-field col s6 m3 l3">
                        <input id="troco" name="troco" type="text" class="validate input" readonly>
                    </div>


                    <div class="input-field col s6 m3 l3">
                        <span class="formastitulo">P/pessoa: </span>
                    </div>
                    <div class="input-field col s6 m3 l3">
                        <input id="ppessoa" name="pessoa" type="text" class="validate input" readonly>
                    </div>
                </div>

                <div class="col s12 botao">
                    <div class="col s12 button-center">
                        <a id="fechar" class="btn waves-effect waves-light button">Fechar Pedido</a>
                        <a href="index.php" class="waves-effect waves-light btn botaoVoltar">
                            Retornar ao menu
                        </a>
                    </div>
                </div>


            </div>
        </div>

















        <script type="text/javascript" src="../../jquery/jquery-3.3.1.min.js"></script>


        <script type="text/javascript" src="../../js/fechamentopedido.js"></script>

        <!--Import JQUERY-->
        <script type="text/javascript" src="../../materialize/jquery/jquery-3.3.1.min.js"></script>

        <!--Import MATERIALIZE.JS-->
        <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>





</body>

</html>