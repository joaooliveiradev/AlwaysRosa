<?php
if(isset($_POST)){
   include '../conexao.php';
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
     echo "</p>";
     echo "  R$ ";
     echo  $total;
    
     }
 
}
