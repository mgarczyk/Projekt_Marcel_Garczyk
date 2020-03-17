<?php
require_once('../pliki/logowanie/connect.php');
if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password_again"])){
    $email = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["email"])));   //zabezpieczenia SQL injection
    $password = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["password"])));
    $password_again = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["password_again"])));
    $regex = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/'; //regex do hasła
    $query = "SELECT Login FROM uzytkownik WHERE Login = '$email';";
    $result = mysqli_query($connect, $query);   //sprawdzenie czy dany email nie znajduje się już w bazie danych
    if (mysqli_num_rows($result)==1){
      if($password==$password_again){
        if(preg_match($regex, $password)){
          $password = password_hash($password, PASSWORD_ARGON2ID); //hashowanie
          $date = date('Y-m-d', time());
          $query = "UPDATE uzytkownik SET Haslo = '$password', ID_status_uzytkownik = 2 WHERE Login = '$email'";
          $result = mysqli_query($connect,$query);
          $_SESSION["email"] = $email;
          mysqli_close($connect);
          header("location: ../logowanie/logowanie.php");
          }else{
            echo "<h7>Nie spełniono warunków dotyczących hasła.</h7>";
          }
        }else{
          echo "<h7>Hasła się od siebie różnią</h7>";
        }
      }else{
        echo "<h7>Konto z podanym adresem email nie istnieje. Sprawdź poprawność wprowadzonych danych</h7>";
      }
    }

 ?>
