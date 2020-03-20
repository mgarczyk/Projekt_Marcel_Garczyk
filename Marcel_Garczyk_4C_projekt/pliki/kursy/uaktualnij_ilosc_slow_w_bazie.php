<?php
session_start();
$ile = $_POST["ilenew"];
$ilosc = $_POST["ilosc_slow_bazanew"];
$dzial = $_POST["kursnew"];
$email = $_SESSION["email"];
$connect = new mysqli('localhost', 'root', '' , 'marcel_garczyk_baza');
if (!$connect) {
      die(mysqli_connect_error());
}
//AKTUALIZACJA postępu kursu
if($ile <= $ilosc){
$query_ilosc_update = "UPDATE kurs
SET Ilosc_slow = $ile
WHERE ID_dzial = (SELECT ID_dzial FROM dzial WHERE Nazwa_dzial LIKE '$dzial')
AND ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login LIKE '$email');";
$result_ilosc_update = mysqli_query($connect, $query_ilosc_update);
}else{
  $query_ilosc_update = "UPDATE kurs
  SET Ilosc_slow = $ilosc
  WHERE ID_dzial = (SELECT ID_dzial FROM dzial WHERE Nazwa_dzial LIKE '$dzial')
  AND ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login LIKE '$email');";
  $result_ilosc_update = mysqli_query($connect, $query_ilosc_update);
}
 ?>
