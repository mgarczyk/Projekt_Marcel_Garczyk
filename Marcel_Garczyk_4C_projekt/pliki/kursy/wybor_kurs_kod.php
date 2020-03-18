<?php
$connect = new mysqli('localhost', 'root', '' , 'marcel_garczyk_baza');
if (!$connect) {
    die(mysqli_connect_error());
}
$query_kursy = "SELECT Nazwa_dzial, Ilosc_slow
FROM kurs
INNER JOIN dzial
ON kurs.ID_dzial = dzial.ID_dzial;";
$result_kursy = mysqli_query($connect, $query_kursy);
echo <<< 'STYL'

STYL;
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
echo "</select>";
echo "<br>";
echo "<br>";


 ?>
