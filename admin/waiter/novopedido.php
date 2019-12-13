<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlwaysRosa - Novo Pedido Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/pedido.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" />
    <link href="../../css/icon.css" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Anotar pedido</h1>

    <div class="container">
        <div class="row">

            <form name="form1" method="post" action="../../php/pedido/admin/novopedido.php" id="escolheMesa">
                <div class="col s12 painel">
                    <h1 class="titulopainel">Selecione a Mesa</h1>

                    <?php
                    session_start();
                    include '../../php/conexao.php';
                    try {
                        $stmt = $conexao->prepare("SELECT *from mesa ");
                        if ($stmt->execute()) {
                            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                ?>
                                <div class="col s3 mesa">
                                    <div class="col s12 img">
                                        <h1 class="texto">Mesa <?= $rs->numero ?></h1>
                                        <?php if ($rs->status == 0) {          ?>
                                            <img src="../../icons/icone2.png">
                                        <?php
                                                    } else {
                                                        ?>
                                            <img src="../../icons/icone3.png">

                                        <?php
                                                    }
                                                    ?>
                                        <div class="col s12 option">
                                            <p>
                                                <label>
                                                    <input name="mesa" type="radio" value="<?= $rs->idmesa ?>" />
                                                    <span></span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "Erro: Não foi possivel recuperar os dados do banco de dados";
                        }
                    } catch (PDOException $erro) {
                        echo "Erro: " . $erro->getMessage();
                    }

                    ?>
                    <div class="col s12 botao">
                        <div class="col s12 button-center">

                            <button class="btn waves-effect waves-light button" type="submit">Fazer Pedido
                                <i class="material-icons left">local_dining</i><i class="material-icons right">local_dining</i>
                            </button>



                            <a href="index.php" class="waves-effect waves-light btn botaoVoltar">
                                Voltar
                            </a>

                        </div>


                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="../../jquery/jquery-3.3.1.min.js"></script>

    <script type="text/javascript" src="../../js/pedido.js"></script>
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