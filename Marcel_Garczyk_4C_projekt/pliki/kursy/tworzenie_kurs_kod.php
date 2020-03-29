<?php
  $connect = new mysqli('localhost', 'root', '' , 'marcel_garczyk_baza');
  if (!$connect) {
      die(mysqli_connect_error());
  }
  if(isset($_POST["kurs_dzial"])){
    $email  = $_SESSION["email"];
    $kurs_dzial = $_POST["select_kurs_dzial"];
    $query_kurs_ilosc = "SELECT COUNT(kurs.ID_dzial) AS Ilosc_kurs
    FROM kurs
    WHERE ID_dzial = (SELECT ID_dzial FROM dzial WHERE Nazwa_dzial LIKE '$kurs_dzial')
    AND ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login LIKE '$email');";
    $result_ilosc_kurs = mysqli_query($connect, $query_kurs_ilosc);
    $row_ilosc_kurs = mysqli_fetch_assoc($result_ilosc_kurs);
    $ilosc_kurs = $row_ilosc_kurs["Ilosc_kurs"];
    if($ilosc_kurs == 0){ //niemozliwe ma byc utwrzenie kolejnych kursów  w tym samym dziale jeżeli poprzedni nie zostal ukończny
    $query_uzytkownik = "INSERT INTO kurs (ID_uzytkownik,Ilosc_slow)
    SELECT ID_uzytkownik, 0
    FROM uzytkownik
    WHERE Login Like '$email';";
    $query_dzial = "UPDATE kurs
    SET ID_dzial = (SELECT ID_dzial FROM dzial WHERE Nazwa_dzial Like '$kurs_dzial')
    WHERE ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login Like'$email') AND ID_dzial = 0;";
    $query_status = "UPDATE kurs
    SET ID_status = (SELECT ID_status FROM status_kursu WHERE Nazwa_Status Like 'Utworzony')
    WHERE ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login Like'$email') AND ID_status = 0;";
    $result_uzytkownik = mysqli_query($connect, $query_uzytkownik);
    $result_dzial = mysqli_query($connect, $query_dzial);
    $result_status = mysqli_query($connect, $query_status);
    mysqli_close($connect);
    header("loction: tworzenie_kurs.php");
    $_SESSION["message_kurs"] = "Pomyślnie utworzono kurs.<br>";
  }else{
    $_SESSION["message_kurs"] = "Utworzyłeś już kurs dotyczący tego działu ukończ go, by móc utworzyć kolejny.<br>";
  }

}
 ?>
