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
                      <h4>Dodaj słowo</h4><br>
                  </div>
                  <br>
                  <form class="text-center" method="post">
                    <input type="text" class="form-control" placeholder="Słowo po polsku" value="" name="polski" /><br>
                    <input type="text" class="form-control" placeholder="Słowo po angielsku" value="" name="angielski" /><br>
                    <select class="form-control" name="dzial">
                      <?php
                      require_once("../pliki/logowanie/connect.php");
                      $query_dzialy = "SELECT Nazwa_Dzial FROM dzial;";
                      $result_dzialy = mysqli_query($connect, $query_dzialy);
                      while($row_dzialy = mysqli_fetch_assoc($result_dzialy)){
                          echo "<option value='$row_dzialy[Nazwa_Dzial]'>Wybierz dział ".$row_dzialy["Nazwa_Dzial"]."</option>";
                      }
                       ?>
                    </select><br>
                    <input type="submit" class="btn-primary btn-max" value="Dodaj słowo" /><br><br>
                    <?php
                    require_once('../pliki/logowanie/connect.php');
                    if(!empty($_POST["polski"]) && !empty($_POST["angielski"]) && !empty($_POST["dzial"])){
                        $polski = strtolower(stripslashes(mysqli_real_escape_string($connect, $_POST["polski"])));   //zabezpieczenia SQL injection
                        $angielski = strtolower(stripslashes(mysqli_real_escape_string($connect, $_POST["angielski"])));
                        $dzial = $_POST["dzial"];
                        $query_powtorzenie_polski = "SELECT Polski FROM slowo WHERE Polski = '$polski';";
                        $query_powtorzenie_angielski = "SELECT Angielski FROM slowo WHERE Angielski = '$angielski';";
                        $result_powtorzenie_polski = mysqli_query($connect, $query_powtorzenie_polski);   //sprawdzenie czy dane slowo nie znajduje się już w bazie danych
                        $result_powtorzenie_angielski = mysqli_query($connect, $query_powtorzenie_angielski);   //sprawdzenie czy dane slowo nie znajduje się już w bazie danych
                        if(mysqli_num_rows($result_powtorzenie_polski)!=0 && mysqli_num_rows($result_powtorzenie_angielski)!=0){
                          echo "To słowo jest już w bazie danych po polsku i angielsku. Nie można go dodać ponownie.<br><br>";
                        }elseif(mysqli_num_rows($result_powtorzenie_angielski)!=0){
                          echo "To słowo już jest w bazie danych po angielsku. Nie można go dodać ponownie.<br><br>";
                        }elseif(mysqli_num_rows($result_powtorzenie_polski)!=0){
                          echo "To słowo jest już w bazie danych po polsku. Nie można go dodać ponownie.<br><br>";
                        }else{
                          $query_dodaj_slowo = "INSERT INTO slowo (Polski, Angielski, ID_Dzial)
                          SELECT '$polski', '$angielski', ID_Dzial
                          FROM dzial
                          WHERE Nazwa_Dzial LIKE '$dzial';";  //wpisz użytkownika do bazy
                          $result_dodaj_slowo = mysqli_query($connect,$query_dodaj_slowo);
                          echo "Słowo zostało dodane pomyślnie. Dodaj kolejne lub wróć do panelu admina<br><br>";
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
