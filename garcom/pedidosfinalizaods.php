<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - Pedidos Finalizados</title>

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
                    <h1 class="titulopainel">Ver Pedidos Finalizados</h1>

                    <table id="table" class="striped centered responsive-table">
                        <thead>
                            <tr>
                                <th>Mesa</th>
                                <th>Produto</th>
                                <th>Observação</th>
                                <th>Finalizar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include_once('../php/conexao.php');
                            $stmt = $conexao->prepare("SELECT iditens, p.descricao, mesa.numero, observacao FROM itens i INNER JOIN produtos p ON p.idprodutos = i.id_produtos_fk INNER JOIN pedido ON pedido.idpedido = i.id_pedido INNER JOIN mesa ON mesa.idmesa = pedido.idmesa WHERE status_pedido = '1' AND status_finalizado = '0'");
                            $stmt->execute();

                            foreach ($stmt as $iten) : extract($iten) ?>
                                <tr>
                                    <td><?= $numero ?></td>
                                    <td><?= $descricao ?></td>
                                    <td><?= $observacao ?></td>
                                    <td><a href="../php/garcom/remove_pedido.php?iditens=<?= $iditens ?>"><i class="material-icons red-text">delete</i></a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <div class="col s12 botao">
                        <div class="col s12 button-center3">
                            <a href="index.php" class="waves-effect waves-light btn botaoVoltar">
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