<?php
session_start();
$ile = $_POST["ilenew"];
$dzial = $_SESSION["dzial"];
$connect = new mysqli ('localhost', 'root', '' , 'marcel_garczyk_baza');
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
}else{
  echo "To już wszstko, wybierz inny dzial.";
}
?>
