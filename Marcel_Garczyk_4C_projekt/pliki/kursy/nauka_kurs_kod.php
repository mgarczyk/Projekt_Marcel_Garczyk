<?php
$ile = $_POST["ilenew"];
$dzial = $_POST["kursnew"];
$connect = new mysqli ('localhost', 'root', '' , 'marcel_garczyk_baza');
if (!$connect) {
    die(mysqli_connect_error());
}

//POLSKI WYŚWIETLANIE w divie #polski
//Formuła niżej pozwala na pobranie słówek z danego działu po polsku i ponmerowanie ich od 1-do max ilości
$slowo = "SELECT 'SELECT (SELECT Polski FROM slowo ) t' + CAST(row_number() over (ORDER BY (select NULL)) AS varchar(30)) AS Ile, Polski FROM slowo WHERE ID_Dzial = (SELECT ID_Dzial FROM dzial WHERE Nazwa_dzial Like '$dzial');"; //pobranie slow sql
$result_slowo_sql=$connect->query($slowo); //pobranie slow
$query_ilosc_slow = "SELECT Count(Polski) AS Ilosc_slow FROM slowo
INNER JOIN dzial
ON slowo.ID_dzial = dzial.ID_Dzial
WHERE dzial.Nazwa_dzial Like '$dzial';";
$result_ilosc_slow = mysqli_query($connect, $query_ilosc_slow);
$row_ilosc_slow = mysqli_fetch_assoc($result_ilosc_slow);
$ilosc_slow = $row_ilosc_slow["Ilosc_slow"];
if ($ile<=0) $ile=1;
if($ile <= $ilosc_slow){
  if($result_slowo_sql->num_rows>0){
    while($row = $result_slowo_sql->fetch_assoc()){
      if($row["Ile"] == $ile) echo $row["Polski"];
    }
  }
}
//ANGIELSKI SPRAWDZENIE CZY DOBRZE
$slowo = "SELECT 'SELECT (SELECT Angielski FROM slowo ) t' + CAST(row_number() over (ORDER BY (select NULL)) AS varchar(30)) AS Ile, Angielski FROM slowo WHERE ID_Dzial = (SELECT ID_Dzial FROM dzial WHERE Nazwa_dzial Like '$dzial');"; //pobranie slow sql
$result_slowo_sql=$connect->query($slowo); //pobranie slow
$query_ilosc_slow = "SELECT Count(Angielski) AS Ilosc_slow FROM slowo
INNER JOIN dzial
ON slowo.ID_dzial = dzial.ID_Dzial
WHERE dzial.Nazwa_dzial Like '$dzial';";
$result_ilosc_slow = mysqli_query($connect, $query_ilosc_slow);
$row_ilosc_slow = mysqli_fetch_assoc($result_ilosc_slow);
$ilosc_slow = $row_ilosc_slow["Ilosc_slow"];
if ($ile<=0) $ile=1;
if($result_slowo_sql->num_rows>0){
    while($row = $result_slowo_sql->fetch_assoc()){
      if($row["Ile"] == $ile){
        $angielski = $row["Angielski"];
            echo "<input type='hidden' id='angielski_baza' value='$angielski'/>";

    }
  }
}
mysqli_close($connect);
?>
