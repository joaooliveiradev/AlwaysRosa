<!DOCTYPE html>
<html>

<head>


    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Always - Cadastro </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../img/favicon.ico" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/cadastro.css">
    <link href="../css/icon.css" rel="stylesheet">
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

                <form action="update_funcionario.php" method="post">
                    <div class="logo">
                        <img src="../../img/logousuario.png" />
                    </div>
                    <h1 class="subtitulo">Atualização de Funcionário</h1>
                    <?php
                    include '../../php/conexao.php';
                    $id = $_GET['id'];
                    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE id=:id");
                    $stmt->bindValue(':id', $id);
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    extract($data[0]);
                    ?>

                    <h1 style="text-align:justify!important; padding-left: 11px!important; font-size: 20px!important; font-weight: 600!important; margin-bottom: 0;
    margin-top: 10px;">ID: </h1>
                    <div class="input-field col s12 " style="margin-bottom: 8px">
                        <input value="<?= $id ?>" name="id" type="text" class="validate inputlogin" style="margin-top: 0!important;margin-bottom:2px!important;" readonly>
                    </div>
                    <h1 style="text-align:justify!important; padding-left: 11px!important; font-size: 20px!important; font-weight: 600!important; margin-bottom: 0;
    margin-top: 10px;">Login: </h1>

                    <div class="input-field col s12 " style="margin-bottom: 8px">
                        <input value="<?= $login ?>" name="login" type="text" class="validate inputlogin" style="margin-top: 0!important;margin-bottom:2px!important;">
                    </div>
                    <h1 style="text-align:justify!important; padding-left: 11px!important; font-size: 20px!important; font-weight: 600!important; margin-bottom: 0;
                    margin-top: 10px;">Senha: </h1>
                    <div class="input-field col s12  ">
                        <input value="<?= $senha ?>" name="senha" placeholder="Digite o Nº da Mesa" type="text" class="validate inputsenha" style="margin-top: 0!important;">
                    </div>
                    <h1 style="text-align:justify!important; padding-left: 11px!important; font-size: 20px!important; font-weight: 600!important; margin-bottom: 0;
                    margin-top: 10px;">Cargo Anterior: </h1>
                    <?php
                    include '../../php/conexao.php';
                    $id = $_GET['id'];
                    $stmt = $conexao->prepare("SELECT usuario.*, cargo.nome_cargo FROM usuario INNER JOIN cargo ON usuario.id_cargo = cargo.id_cargo WHERE id = :id");
                    $stmt->bindValue(':id', $id);
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    extract($data[0]);
                    ?>
                    <div class="input-field col s12  ">
                        <input value="<?= $nome_cargo ?>" type="text" class="validate inputsenha" style="margin-top: 0!important;" readonly>
                    </div>

                    <span class="subtitulo2">Selecione o novo cargo do funcionário: <span>
                            <select name="selectCategoria">
                                <?php
                                include '../php/conexao.php';
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
                                <button class="waves-effect waves-light btn botaoCadastro" type="submit">Atualizar</button>
                                <a href="../../admin/cadastro.php" class="waves-effect waves-light btn botaoVoltar">
                                    Voltar
                                </a>
                            </div>



                </form>



            </div>
        </div>
    </div>


    <!--Import JQUERY-->
    <script type="text/javascript" src="../../materialize/jquery/jquery-3.3.1.min.js"></script>

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>




</body>

</html>