<?php
require_once('../pliki/logowanie/connect.php');
if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password_again"])){
    $email = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["email"])));   //zabezpieczenia SQL injection
    $password = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["password"])));
    $password_again = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["password_again"])));
    $regex = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    $query = "SELECT Login FROM uzytkownik WHERE Login = '$email';";
    $result = mysqli_query($connect, $query);   //sprawdzenie czy dany email nie znajduje się już w bazie danych
    if (mysqli_num_rows($result)==0){
      if($password==$password_again){
        if(preg_match($regex, $password)){
          $password = password_hash($password, PASSWORD_ARGON2ID);
          $date = date('Y-m-d', time());
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
