<?php
$connect = new mysqli('localhost', 'root', '' , 'marcel_garczyk_baza');
$email = $_SESSION["email"];
if (!$connect) {
    die(mysqli_connect_error());
}

//tworzenie SELECT
//kurs_nazwa_dzial
$query_kursy = "SELECT Nazwa_dzial, Ilosc_slow
FROM kurs
INNER JOIN dzial
ON kurs.ID_dzial = dzial.ID_dzial
WHERE ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login LIKE '$email');";
$result_kursy = mysqli_query($connect, $query_kursy);
//ilosc kursow
$query_ilosc_kursow = "SELECT Count(ID_kurs) AS Ilosc_kursow FROM kurs WHERE ID_uzytkownik = (SELECT ID_Uzytkownik FROM uzytkownik WHERE Login LIKE '$email')";
$result_ilosc_kursow = mysqli_query($connect, $query_ilosc_kursow);
$row_ilosc_kursow = mysqli_fetch_assoc($result_ilosc_kursow);
$ilosc_kursow = $row_ilosc_kursow["Ilosc_kursow"];
//SELECT
echo "<select name='wybierz_kurs' style='border: #108E84 1px solid; border-radius: 1.5rem; width: 525px; height: 40px; padding: 1.5%; color: black; font-size: 16px; font-family: 'Helvetica';'>";
while($row_kursy = mysqli_fetch_assoc($result_kursy)){
  if($row_kursy["Nazwa_dzial"] == 'SO'){
    echo "<option value='SO'>Systemy Operacyjne, postęp: ".$row_kursy["Ilosc_slow"]." slow</option>";
    }
  elseif($row_kursy["Nazwa_dzial"] == 'UTK'){
    echo "<option value='UTK'>Urządzenia Techniki Komputerowej, postęp: ".$row_kursy["Ilosc_slow"]." slow</option>";
    }
  elseif($row_kursy["Nazwa_dzial"] == 'SK'){
  echo "<option value='SK'>Sieci Komputerowe, postęp: ".$row_kursy["Ilosc_slow"]." slow</option>";
  }
}
if($ilosc_kursow == 0){
  echo "<option id='czybrak' value='$ilosc_kursow'>Koniec kursów? Utworz nowe!</option>";
}else{
  echo "<option id='czybrak' hidden value='$ilosc_kursow'>Koniec kursów? Utworz nowe!</option>";
}
echo "</select>";
echo "<br>";
echo "<br>";




 ?>
