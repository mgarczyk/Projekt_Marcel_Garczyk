<?php
require_once('../pliki/logowanie/connect.php');
if(!empty($_POST["email"]) && !empty($_POST["password"])){
  $email = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["email"])));
  $password = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["password"])));
  $query = "SELECT Haslo, ID_status_uzytkownik, ID_uprawnienia FROM uzytkownik WHERE Login = '$email';";
  $result = mysqli_query($connect,$query);
  $row = mysqli_fetch_assoc($result);
  if($row["ID_status_uzytkownik"] == 3){
    if(password_verify($password,$row["Haslo"]) == true){ //sprawdzanie czy hash hasła z bazy danych  zgadza się z hashem hasła podanego przez użytkownika
      $_SESSION["email"] = $email;
      $_SESSION["uprawnienia"] = $row["ID_uprawnienia"];
      $_SESSION["logged"] = true;
      $query = "UPDATE uzytkownik SET ID_status_uzytkownik = 1 WHERE Login = '$email'";
      mysqli_query($connect, $query);
      mysqli_close($connect);
      if(isset($_SESSION["potwierdzenie"])) unset($_SESSION["potwierdzenie"]);
      header("location: ../index/indexlog.php");
      }else{
      echo "<h7>Podano nieprawidłowe hasło lub login</h7>";
    }
  }elseif($row["ID_status_uzytkownik"] == NULL){
        echo "Ten użytkownik nie utworzył jeszcze konta więc nie może zostać potwierdzony</h7>";
  }else{
    echo "<h7>Ten użytkownik został już potwierdzony i nie ma potrzeby robić tego ponownie.</h7>";
  }
}

 ?>
