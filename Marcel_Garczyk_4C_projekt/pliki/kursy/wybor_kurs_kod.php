<?php
$connect = new mysqli('localhost', 'root', '' , 'marcel_garczyk_baza');
$email = $_SESSION["email"];
if (!$connect) {
    die(mysqli_connect_error());
}
//tworzenie SELECT
//kurs_nazwa_dzial
$query_kursy = "SELECT Nazwa_Dzial, Ilosc_slow
FROM dzial
INNER JOIN kurs
ON dzial.ID_Dzial = kurs.ID_dzial
WHERE ID_uzytkownik = (SELECT ID_Uzytkownik FROM uzytkownik WHERE Login LIKE '$email');";
$result_kursy = mysqli_query($connect, $query_kursy);
//ilosc kursow
$query_ilosc_kursow = "SELECT Count(ID_kurs) AS Ilosc_kursow FROM kurs WHERE ID_uzytkownik = (SELECT ID_Uzytkownik FROM uzytkownik WHERE Login LIKE '$email')";
$result_ilosc_kursow = mysqli_query($connect, $query_ilosc_kursow);
$row_ilosc_kursow = mysqli_fetch_assoc($result_ilosc_kursow);
$ilosc_kursow = $row_ilosc_kursow["Ilosc_kursow"];
//SELECT
while($row_kursy = mysqli_fetch_assoc($result_kursy)){
    echo "<option value='$row_kursy[Nazwa_Dzial]'>Kurs ".$row_kursy["Nazwa_Dzial"].", postęp: ".$row_kursy["Ilosc_slow"]."</option>";
}
if($ilosc_kursow == 0){
  echo "<option id='czybrak' value='$ilosc_kursow'>Koniec kursów? Utworz nowe!</option>";
}else{
  echo "<option id='czybrak' hidden value='$ilosc_kursow'>Koniec kursów? Utworz nowe!</option>";
}
 ?>
