<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Always - Cadastro </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link href="../../css/icon.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/cadastro.css">
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../../img/logo.png" /></a>
        </div>
    </nav>


    <!-- Navbar goes here -->

    <!-- Page Layout here -->
    <div class="container">
        <div class="row">
            <div class="col s12 cadastro">

                <form name="formulario" action="../../php/funcionario/insert_funcionario.php" method="POST">
                    <div class="logo">
                        <img src="../../img/logousuario.png" />
                    </div>
                    <h1 class="subtitulo">Cadastro de Funcionário</h1>

                    <input name="login" class="inputlogin" type="text" placeholder="Usúario" required />
                    <input name="senha" class="inputsenha" type="password" placeholder="Senha" required />
                    <span class="subtitulo2">Selecione o cargo do funcionário: <span>
                            <select name="selectCategoria">
                                <?php
                                include '../../php/conexao.php';
                                try {
                                    $stt = $conexao->prepare("SELECT * FROM cargo");
                                    if ($stt->execute()) {
                                        while ($rs = $stt->fetch(PDO::FETCH_OBJ)) {
                                            echo "<option value='$rs->id_cargo'>";
                                            echo "$rs->nome_cargo";
                                            echo "</option>";
                                        }
                                    } else {
                                        echo "Erro: Não foi possível recuperar os dados do banco de dados";
                                    }
                                } catch (PDOException $erro) {
                                    echo "Erro: " . $erro->getMessage();
                                }


                                ?>
                            </select>

                            <div class="button-center">
                                <button class="waves-effect waves-light btn botaoCadastro" type="submit">Cadastrar</button>
                                <a href="../" class="waves-effect waves-light btn botaoVoltar">
                                    Voltar
                                </a>
                            </div>

                            <table class="striped centered responsive-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Login</th>
                                        <th>Senha</th>
                                        <th>Cargo</th>
                                        <th>Operações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php include_once('../../php/funcionario/select_funcionario.php'); ?>
                                </tbody>
                            </table>



                </form>



            </div>
        </div>
    </div>

    <!--Import JQUERY-->
    <script type="text/javascript" src="../materialize/jquery/jquery-3.3.1.min.js"></script>

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>




</body>

</html>