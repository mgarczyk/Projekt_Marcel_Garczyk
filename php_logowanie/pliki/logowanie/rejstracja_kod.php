<?php
require_once('../pliki/logowanie/connect.php');
if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password_again"])){
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $password_again = mysqli_real_escape_string($connect, $_POST["password_again"]);
    $email = trim(stripslashes($email));
    $password = trim(stripslashes($password));
    $password_again = trim(stripcslashes($password_again));
    $regex = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    $date = date('Y-m-d', time());
    $query = "SELECT Login FROM uzytkownik WHERE Login = '$email';";  //sprawdzanie czy nie ma juz użytkonika o tym adresie email
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result)==0){
      if($password==$password_again){
        if(preg_match($regex, $password)){
          $query = "INSERT INTO uzytkownik(Login, Haslo, ID_status_uzytkownik, Data_Ostatniego_Logowania, ID_uprawnienia) VALUES ('$email', '$password', 1, '$date', 1);";  //wpisz użytkownika do bazy
          $result = mysqli_query($connect,$query);
          $_SESSION["email"] = $email;
          mysqli_close($connect);
          header("location: ../index/indexlog.php");
          }else{
            echo "<h7>Nie spełniono warunków dotyczących hasła.</h7>";
          }
        }else{
          echo "<h7>Hasła się od siebie różnią</h7>";
        }
      }else{
        echo "<h7>Konto z podanym adresem email już istnieje. Możesz spróbować odzyskać hasło</h7>";
      }
    }

 ?>
