<?php
session_start();
unset($_SESSION["pedido"]["id"]);
header('location: ../../garcom/index.php')
?>