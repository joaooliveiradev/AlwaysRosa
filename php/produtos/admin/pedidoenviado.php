<?php
session_start();
unset($_SESSION["pedido"]["id"]);
header('location: ../../../admin/garcom/index.php')
?>