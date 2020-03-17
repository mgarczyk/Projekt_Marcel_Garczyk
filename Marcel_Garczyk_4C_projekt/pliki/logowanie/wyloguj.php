<?php
require_once('connect.php');
session_start();
$query = "UPDATE uzytkownik SET ID_status_uzytkownik = 2 WHERE Login = '".$_SESSION['email']."'";
mysqli_query($connect, $query);
unset($_SESSION["email"]);
mysqli_close($connect);
session_destroy();
header("location: ../../index/index.php")

 ?>
