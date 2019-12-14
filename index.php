<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DonaRosa - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="img/logo.png" /></a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col s12 login">
                <form name="formulario" method="POST">
                    <div class="logo">
                        <img src="img/logousuario.png" />
                    </div>
                    <h1 class="subtitulo">Login</h1>

                    <input name="login" class="inputlogin" type="text" placeholder="Usúario" required />
                    <input name="senha" class="inputsenha" type="password" placeholder="Senha" required />

                    <div class="button-center">
                        <button class="waves-effect waves-light btn botaoLogin" type="submit">Logar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {



        $login = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

        include 'php/conexao.php';

        try {

            $stmt = $conexao->prepare("SELECT * FROM `usuario` WHERE login = :login and senha = :senha");
            $stmt->bindValue(":login", $login);
            $stmt->bindValue(":senha", $senha);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                session_start();
                $user = $stmt->fetch();
                $cargo = $user["id_cargo"];
                $_SESSION['cargo'] = $cargo;
                if ($cargo == "1") {
                    header("location: caixa/index.php");
                } else if ($cargo == "2") {
                    header("location: garcom/index.php");
                } else if ($cargo == "3") {
                    header("location: admin/index.php");
                } else if ($cargo == "4") {
                    header("location: cozinheiro/index.php");
                }
            } else {
                echo "<script>alert('Dados Invalidos')</script>";
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    };

    ?>

    <script type="text/javascript" src="materialize/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</body>

</html>