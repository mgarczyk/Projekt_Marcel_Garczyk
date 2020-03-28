<?php
require_once('../pliki/logowanie/connect.php');
if(!empty($_POST["email"]) && !empty($_POST["password"])){
  $email = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["email"])));
  $password = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["password"])));
  $query = "SELECT Haslo, ID_status_uzytkownik, ID_uprawnienia FROM uzytkownik WHERE Login = '$email';";
  $result = mysqli_query($connect,$query);
  $row = mysqli_fetch_assoc($result);
  if($row["ID_status_uzytkownik"] != 3){
    if(password_verify($password,$row["Haslo"]) == true){ //sprawdzanie czy hash hasła z bazy danych  zgadza się z hashem hasła podanego przez użytkownika
      $_SESSION["email"] = $email;
      $_SESSION["logged"] = true;
      $_SESSION["uprawnienia"] = $row["ID_uprawnienia"];
      $query = "UPDATE uzytkownik SET ID_status_uzytkownik = 1 WHERE Login = '$email'";
      mysqli_query($connect, $query);
      mysqli_close($connect);
      header("location: ../index/indexlog.php");
      }else{
      echo "<h7>Podano nieprawidłowe hasło lub login</h7>";
      }
    }else{
      echo "<h7 style='text-align: justify;'>Na podany przez Ciebie adres email została wysłąna wiadomość pozwalająca
      potwierdzić założenie konta. Logowanie będzie dopiero możliwe po potwierdzeniu rejstracji.</h7>";
    }
  }

 ?>
