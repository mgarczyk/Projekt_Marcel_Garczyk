<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Stwórz kurs</title>
        <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <meta name="description" content="Nauka angielskiego technicznego dla informatyków.">
        <meta name="keywords" content="angielski techniczny, informatyka, fiszki, kursy, słówka">
        <meta name="author" content="Marcel Garczyk">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <?php
      if(isset($_SESSION["email"]) && $_SESSION["logged"] == true){
        require_once("../stale_elementy/navbarlog.php");
        }else{
        require_once("../stale_elementy/navbar.php");
        }
      ?>
      <?php
      if(isset($_POST["kurs_dzial"])){
        $dzial_kurs = $_POST["select_kurs_dzial"];
        require_once("../pliki/logowanie/connect.php");
        $query_ilosc_slow_dzial = "SELECT Count(Angielski) AS Ilosc_slow FROM slowo
        INNER JOIN dzial
        ON slowo.ID_dzial = dzial.ID_Dzial
        WHERE dzial.Nazwa_dzial Like '$dzial_kurs';";
        $result_ilosc_slow_dzial = mysqli_query($connect, $query_ilosc_slow_dzial);
        $row_ilosc_slow_dzial = mysqli_fetch_assoc($result_ilosc_slow_dzial);
        $ilosc_slow_dzial = $row_ilosc_slow_dzial["Ilosc_slow"];
        if($ilosc_slow_dzial == 0){
          $_SESSION["pusty_dzial_kurs"] = "W tym dziale nie dodano jeszcze słówek. Spróbuj ponownie później.<br><br>";
        }else{
             require_once("../pliki/kursy/tworzenie_kurs_kod.php");
        }
      }
       ?>
      <div class="container">
            <div class="row">
                <div class="col-lg-6 margin margin-top">
                  <div class="h_class">
                      <h4>Stwórz nowy kurs</h4><br>
                  </div>
                  <br>
                  <form class="text-center" name="form_kurs" method="post" action="">
                    <select class="form-control" name="select_kurs_dzial">
                      <?php
                      $connect = new mysqli('localhost', 'root', '', 'marcel_garczyk_baza');
                      if (!$connect) {
                          die(mysqli_connect_error());
                      }
                      $query_dzialy = "SELECT Nazwa_Dzial FROM dzial;";
                      $result_dzialy = mysqli_query($connect, $query_dzialy);
                      while($row_dzialy = mysqli_fetch_assoc($result_dzialy)){
                          echo "<option value='$row_dzialy[Nazwa_Dzial]'>Wybierz dział ".$row_dzialy["Nazwa_Dzial"]."</option>";
                      }
                       ?>
                    </select><br>
                    <?php
                    if(isset($_SESSION["pusty_dzial_kurs"])){
                      echo $_SESSION["pusty_dzial_kurs"];
                      unset($_SESSION["pusty_dzial_kurs"]);
                      }
                    ?>
                    <?php
                       if(isset($_SESSION["message_kurs"]))
                       echo $_SESSION["message_kurs"]."<br>";
                       unset($_SESSION["message_kurs"]);
                    ?>
                    <input type="submit" name="kurs_dzial" class="btn-primary btn-max" value="Stwórz nowy kurs"/><br>
                    <div class="" style="margin-bottom: 30px; margin-top: 30px;">
                    </div>
                  </form>
                  <a href="wybor_kurs.php"><input type="button" class="btn-primary btn-max" value="Przejdź do wyboru"></a><br><br>
                  <a href="../index/index.php"><input type="button" class="btn-outline-primary btn-max" value="Strona główna" /></a><br><br>
                </div>
              </div>
          </div>
          <?php
          if(isset($_SESSION["email"]) && isset($_SESSION["logged"])){
            require_once("../stale_elementy/footerlog.php");
            }else{
            require_once("../stale_elementy/footer.php");
          }
          ?>
    </body>
</html>
