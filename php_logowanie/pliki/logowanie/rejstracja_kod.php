<?php
require_once('../pliki/logowanie/connect.php');
if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password_again"])){
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $password_again = mysqli_real_escape_string($connect, $_POST["password_again"]);
    $email = trim(stripcslashes($email));
    $password = trim(stripcslashes($password));
    $password_again = trim(stripcslashes($password_again));
    $date = date('Y-m-d', time());
    $query = "SELECT Login FROM uzytkownik WHERE Login = '$email';";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result)==0){
      if($password==$password_again){
          //$password = md5($password);
          $query = "INSERT INTO uzytkownik(Login, Haslo, ID_status_uzytkownik, Data_Ostatniego_Logowania, ID_uprawnienia) VALUES ('$email', '$password', 1, '$date', 1);";
          $result = mysqli_query($connect,$query);
          $_SESSION["username"] = $email;
          header("location: ../index/indexlog.php");
      }else{
        echo "<h3>Hasła się od siebie różnią</h3>";
      }
  }else{
    echo "<h3>Konto z podanym adresem email już istnieje. Możesz spróbować odzyskać hasło</h3>";
  }
}

 ?>
