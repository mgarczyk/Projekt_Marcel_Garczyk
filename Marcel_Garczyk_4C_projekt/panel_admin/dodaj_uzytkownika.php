<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Rejstracja</title>
        <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <meta name="description" content="Nauka angielskiego technicznego dla informatyków.">
        <meta name="keywords" content="angielski techniczny, informatyka, fiszki, kursy, słówka">
        <meta name="author" content="Marcel Garczyk">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <div class="container login-container">
            <div class="row">
                <div class="col-lg-6 login-form-1 margin margin-top">
                  <div class="h_class">
                      <h4>Dodawanie użytkownika</h4><br>
                  </div>
                  <br>
                  <form class="text-center" method="post" name="rejstracja">
                    <input type="email" class="form-control form-rounded" placeholder="Podaj e-mail" value="" name="email"/><br>
                    <input type="password" class="form-control" placeholder="Podaj hasło" value="" name="password" onclick="haslo()"/><br>
                    <div id="reguly"></div>
                    <input type="password" class="form-control" placeholder="Powtórz hasło" value="" name="password_again"/><br>
                    <select class="form-control" name="uprawnienia">
                        <option value="1">Zwykły_uzytkownik</option>
                        <option value="2">Administrator</option>
                    </select><br>
                    <input type="submit" class="btn-primary btn-max" value="Utwórz użytkownika" /><br><br>
                    <a href="admin.php"><input type="button" class="btn-outline-primary btn-max" value="Panel admina"/></a><br><br>
                    <script type="text/javascript">
                      function haslo(){
                        var element = document.getElementById('reguly');
                        element.innerHTML = "Użyj od 8 do 20 znaków. Aby zwiększyć poziom bezpieczeństwa hasła, stosuj małe i duże litery, cyfry oraz znaki specjalne.<br><br>";

                      }
                    </script>
                    <?php
                    require_once('../pliki/logowanie/connect.php');
                    if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password_again"]) && !empty($_POST["uprawnienia"])){
                        $email = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["email"])));   //zabezpieczenia SQL injection
                        $password = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["password"])));
                        $password_again = trim(stripslashes(mysqli_real_escape_string($connect, $_POST["password_again"])));
                        $uprawnienia = $_POST["uprawnienia"];
                        $regex = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
                        $query = "SELECT Login FROM uzytkownik WHERE Login = '$email';";
                        $result = mysqli_query($connect, $query);   //sprawdzenie czy dany email nie znajduje się już w bazie danych
                        if (mysqli_num_rows($result)==0){
                          if($password==$password_again){
                            if(preg_match($regex, $password)){
                              $password = password_hash($password, PASSWORD_ARGON2ID);
                              $date = date('Y-m-d', time());
                              $query = "INSERT INTO uzytkownik(Login, Haslo, ID_status_uzytkownik, Data_Ostatniego_Logowania, ID_uprawnienia) VALUES ('$email', '$password', 2, '$date', $uprawnienia);";  //wpisz użytkownika do bazy
                              $result = mysqli_query($connect,$query);
                              mysqli_close($connect);
                              echo "Dodano użytkownika możesz dodać kolejnego lub powrócić do panelu administratora.";
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
                </div>
              </div>
          </div>
    </body>
</html>
