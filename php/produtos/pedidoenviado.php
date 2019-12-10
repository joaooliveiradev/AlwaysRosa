<?php
session_start();
unset($_SESSION["pedido"]["id"]);
header('location: ../../garcom/garcom.php')
?>