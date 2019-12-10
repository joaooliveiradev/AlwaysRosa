<!DOCTYPE html>
<html>

<head>

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection" />
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Always - Relatorio de Vendas no mês</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/mesa.css">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center"><img src="../img/logo.png" /></a>
        </div>
    </nav>

    <h1 class="titulo">Vendas no mês</h1>

    <div class="container">
        <div class="row">
            <div class="painel">
                <form action="#" method="POST">
                <div class="row">
                    <div class="row">
                        <div class="input col s6">
                            <span style="font-size: 20px; font-weight: 600">Data Inicial: </span>
                            <input name="data_inicial" id="dataInicial" type="text" class="datepicker">
                            <!--<input  id="first_name" type="date" class="validate" name="data_inicial">-->
                        </div>
                        <div class="input col s6">
                            <span style="font-size: 20px; font-weight: 600">Data Final: </span>
                            <input name="data_final" id="dataFinal" type="text" class="datepicker">
                            <!--<input  id="first_name" type="date" class="validate" name="data_final">-->
                        </div>
                    </div>

        <div class="col s12 botao">
             <div class="button-center">
                 <button class="btn waves-effect waves-light button" type="submit">Enviar</button>
                     <a  href="../admin/resumovendas.php" class="waves-effect waves-light btn botaoVoltar">Voltar</a>
                     <br>
                     <a style="margin-top: 10px;" class="waves-effect waves-light btn modal-trigger  red darken-4 center " href="#modal1" type="submit" class="btn waves-effect waves-light button">Visualizar Lucro </a>
            </div>
            <br>
        </div>
    </div>
</div> 




<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer" style="height:135px; width:300px;font-size:50px;font-aling;padding:center;">


    
<span style="display:block; text-align: center; font-size: 30px; font-weight: 600">Lucro Obtido</span>   
 <?php

if(isset($_POST)){
    include '../php/conexao.php';
    $data_inicial = (isset($_POST["data_inicial"]) && $_POST["data_inicial"] != null) ? $_POST["data_inicial"] : "";
    $hora_inicial = "00:00:00";

   
    $data_final = (isset($_POST["data_final"]) && $_POST["data_final"] != null) ? $_POST["data_final"] : "";
    $hora_final = "23:59:59";

   
    $dt1 = $data_inicial." ".$hora_inicial; 
    $dt2 = $data_final." ".$hora_final; 
   
    $stmt = $conexao->prepare("SELECT sum(preco) AS total FROM itens WHERE data_hora >= '".$dt1."' and data_hora <= '".$dt2."' ");
    $stmt->execute();
 
   
   foreach ($stmt as $res){
      extract($res);
      echo "<span style='display: block; text-align: center;'>";
      echo "  R$ ";
      if($total === null){
          $total = 0;
          echo $total;
      }else{
          echo $total;
      }
    echo "</span>";
      }
  
 }



?>




 

    <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>

    <!--Import JQUERY-->
    <script type="text/javascript" src="../materialize/jquery/jquery-3.3.1.min.js"></script>

    <!--Import MATERIALIZE.JS-->
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>


    <script>
    
        $(document).ready(function () {
            $('.datepicker').datepicker();
            $('#dataInicial').datepicker({
            i18n: {
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
            today: 'Hoje',
            clear: 'Limpar',
            cancel: 'Sair',
            done: 'Confirmar',
            labelMonthNext: 'Próximo mês',
            labelMonthPrev: 'Mês anterior',
            labelMonthSelect: 'Selecione um mês',
            labelYearSelect: 'Selecione um ano',
            selectMonths: true,
            selectYears: 15,
            },
            format: 'yyyy-mm-dd',
            container: 'body',
            });
            $('#dataFinal').datepicker({
            i18n: {
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
            today: 'Hoje',
            clear: 'Limpar',
            cancel: 'Sair',
            done: 'Confirmar',
            labelMonthNext: 'Próximo mês',
            labelMonthPrev: 'Mês anterior',
            labelMonthSelect: 'Selecione um mês',
            labelYearSelect: 'Selecione um ano',
            selectMonths: true,
            selectYears: 15,
            },
            format: 'yyyy-mm-dd',
            container: 'body',
            });
            $('.modal').modal();
           
        });

    </script>
</body>
</html>