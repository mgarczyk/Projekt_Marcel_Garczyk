<?php
$query_ilosc_slow_dzial = "SELECT Count(Angielski) AS Ilosc_slow FROM slowo
INNER JOIN dzial
ON slowo.ID_dzial = dzial.ID_Dzial
WHERE dzial.Nazwa_dzial Like '$kurs';";
$result_ilosc_slow_dzial = mysqli_query($connect, $query_ilosc_slow_dzial);
$row_ilosc_slow_dzial = mysqli_fetch_assoc($result_ilosc_slow_dzial);
$ilosc_slow_dzial = $row_ilosc_slow_dzial["Ilosc_slow"];
if($ilosc_slow_dzial == 0){
  $_SESSION["brak_slow"] = "W tym dziale nie ma żadnych słówek więc nie można zacząć nauki. Spróbuj później";
}


 ?>
