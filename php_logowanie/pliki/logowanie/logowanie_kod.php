<?php
require_once('../pliki/logowanie/connect.php');
if(!empty($_POST["email"]) && !empty($_POST["password"])){
  $email = mysqli_real_escape_string($connect, $_POST["email"]);
  $password = mysqli_real_escape_string($connect, $_POST["password"]);
  $email = trim(stripcslashes($email));
  $password = trim(stripcslashes($password));
  $query = "SELECT Login FROM uzytkownik WHERE Login = '$email' && Haslo = '$password';";
  $result = mysqli_query($connect,$query);
  $row = mysqli_num_rows($result);
  if($row==1){
    $_SESSION["username"] = $email;
    $query = "UPDATE uzytkownik SET ID_status_uzytkownik = 1 WHERE Login = '$email'";
    mysqli_query($connect, $query);
    header("location: ../index/indexlog.php");
    }else{
    echo "<h3>Podano nieprawidłowe hasło lub login</h3>";
    }
  }
 ?>
