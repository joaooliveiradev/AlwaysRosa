<?php
session_start();
unset($_SESSION["pedido"]["id"]);
header('location: ../../../admin/waiter/index.php')
?>