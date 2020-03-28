<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Dodaj slowo</title>
        <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
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
                      <h4>Dodaj dział</h4><br>
                  </div>
                  <br>
                  <form class="text-center" method="post">
                    <input type="text" class="form-control" placeholder="Nazwa działu powinna być skrótem np. SK (Sieci Komputerowe)" value="" name="dzial" /><br>
                    <input type="submit" class="btn-primary btn-max" value="Dodaj dział" /><br><br>
                    <?php
                    require_once('../pliki/logowanie/connect.php');
                    if(!empty($_POST["dzial"])){
                        $dzial = strtoupper(stripslashes(mysqli_real_escape_string($connect, $_POST["dzial"])));   //zabezpieczenia SQL injection
                        $query_powtorzenie_dzial = "SELECT Nazwa_Dzial FROM dzial WHERE Nazwa_Dzial = '$dzial';";
                        $result_powtorzenie_dzial = mysqli_query($connect, $query_powtorzenie_dzial);   //sprawdzenie czy dane dzial nie znajduje się już w bazie danych
                        if(strlen($dzial) > 5){
                          echo "Podano za długą nazwę działu. Może ona wynosić maksymalnie 5 znaków<br><br>";
                        }elseif(mysqli_num_rows($result_powtorzenie_dzial)!=0){
                          echo "Ten dział już znajduje się w bazie danych i nie można go dodać ponownie<br><br>";
                        }else{
                          $query_dodaj_dział = "INSERT INTO dzial (Nazwa_Dzial) VALUES ('$dzial')";
                          $result_dodaj_dzial = mysqli_query($connect, $query_dodaj_dział);
                          echo "Dział został dodany pomyślnie. Możesz dodać kolejny lub wrócić do panelu administratora<br><br>";
                        }
                      }
                     ?>
                    <a href="admin.php"><input type="button" class="btn-outline-primary btn-max" value="Panel admina"/></a><br><br>
                  </form>
                </div>
              </div>
          </div>
    </body>
</html>
