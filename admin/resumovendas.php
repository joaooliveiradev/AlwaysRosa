<!DOCTYPE html>
<html>
<?php
include '../php/conexao.php';
?>

<head>

  <!--Import MATERIALIZE.CSS-->
  <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection" />

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AlwaysRosa - Resumo de Vendas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="../css/relatorio.css">
  <link rel="shortcut icon" href="../img/favicon.ico" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>


  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center"><img src="../img/logo.png" /></a>
    </div>
  </nav>

  <h1 class="titulo">Resumo de Vendas</h1>

  <div class="container">
    <div class="painel" style="height: 370px;padding-top:30px;">

      <div class="row">


        <div class="col s12 m6 l4 waves-effect center-align modal-trigger" data-target="modal1">
          <i class="black-text text-lighten-1 large material-icons">local_grocery_store</i>
          <span class="black-text text-lighten-1">
            <h5>Produtos mais Vendidos</h5>
          </span>
        </div>

        <div id="modal1" class="modal">
          <div class="modal-content">
            <h4>Produtos mais vendidos</h4>
            <div id="container1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
          </div>
        </div>


        <a href="vendasMes.php">
          <div id="lucroProdutos" class="col s12 m6 l4 waves-effect center-align modal-trigger">
            <i  class="black-text text-lighten-1 large material-icons">attach_money</i>
            <span class="black-text text-lighten-1">
              <h5>Lucro dos Produtos</h5>
            </span>
          </div>
        </a>

      
            <div class="col s12 m6 l4 waves-effect center-align modal-trigger" data-target="modal3">
              <i class="black-text text-lighten-1 large material-icons">local_grocery_store</i>
              <span class="black-text text-lighten-1">
                <h5>Produtos menos Vendidos</h5>
              </span>
            </div>

            <div id="modal3" class="modal">
              <div class="modal-content">
                <h4>Produtos menos vendidos</h4>
                <div id="container3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
              </div>
            </div>

        


      </div>

    <div>

     



    </div>


      <div class="button-center">
        <a href="admin.php" class="waves-effect waves-light btn botaoVoltar">
          Voltar
        </a>
      </div>




      <!--FIM DO  PAINEL-->
    </div>
  </div>
  <!--FIM DO CONTAINER-->


  <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>

  <!--Import JQUERY-->
  <script type="text/javascript" src="../materialize/jquery/jquery-3.3.1.min.js"></script>
  <!--IMPORTANDO JS -->

  <!--Import MATERIALIZE.JS-->
  <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>

  
  <script src="../js/highcharts.js"></script>
  <script src="../js/exporting.js"></script>
  <script src="../js/export-data.js"></script>

  <script>
  $(document).ready(function(){
    $('.modal').modal();
  });
  </script>


  <script>
    // Radialize the colors
    Highcharts.setOptions({
      colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
        return {
          radialGradient: {
            cx: 0.5,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
          ]
        };
      })
    });

    // CRIA O PRIMEIRO GRAFICO
    Highcharts.chart('container1', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: 'Produtos mais Vendidos'
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            connectorColor: 'silver'
          }
        }

      },
      series: [{
        name: 'Porcentagem',
        data: [
          <?php
          //if(isset($_POST)){
          $stmt = $conexao->prepare("SELECT COUNT(*) qtd, p.descricao as nome FROM produtos p INNER JOIN itens i on i.id_produtos_fk = p.idprodutos group by i.id_produtos_fk ORDER BY qtd DESC LIMIT 10");
          // executa
          $stmt->execute();
          foreach ($stmt as $res) {

            extract($res);
            echo "{name: '" . $nome . "', y: " . $qtd . " },";
          }
          //}

          ?>

        ]
      }]

    });




    // CRIA O TERCEIRO GRAFICO
    Highcharts.chart('container3', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: 'Produtos menos vendidos'
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            connectorColor: 'silver'
          }
        }

      },
      series: [{
        name: 'Porcentagem',
        data: [
          <?php
          //if(isset($_POST)){
          $stmt = $conexao->prepare("SELECT COUNT(*) qtd, p.descricao as nome FROM produtos p INNER JOIN itens i on i.id_produtos_fk = p.idprodutos group by i.id_produtos_fk ORDER BY qtd ASC LIMIT 10");
          // executa
          $stmt->execute();
          foreach ($stmt as $res) {
            extract($res);
            echo "{name: '" . $nome . "', y: " . $qtd . " },";
          }
          //}

          ?>

        ]
      }]

    });
  </script>



</body>

</html>