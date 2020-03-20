<?php
session_start();
$dzial = $_POST["kursnew"];
$email = $_SESSION["email"];
  $connect = new mysqli('localhost', 'root', '' , 'marcel_garczyk_baza');
  if (!$connect) {
      die(mysqli_connect_error());
}
//USUN kurs
$query_usun = "DELETE FROM kurs WHERE ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login LIKE '$email')
AND ID_dzial = (SELECT ID_dzial FROM dzial WHERE Nazwa_dzial LIKE '$dzial')";
$result_usun = mysqli_query($connect, $query_usun);


?>
