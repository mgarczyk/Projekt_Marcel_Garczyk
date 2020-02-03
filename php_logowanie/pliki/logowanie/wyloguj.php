<?php
require_once('connect.php');
session_start();
$email = $_SESSION["username"];
$query = "UPDATE uzytkownik SET ID_status_uzytkownik = 2 WHERE Login = '$email'";
mysqli_query($connect, $query);
unset($_SESSION["username"]);
session_destroy();
header("location: ../../index/index.php")

 ?>
