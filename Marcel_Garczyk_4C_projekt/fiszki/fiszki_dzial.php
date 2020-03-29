<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Fiszki - wybierz dział</title>
        <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <meta name="description" content="Nauka angielskiego technicznego dla informatyków.">
        <meta name="keywords" content="angielski techniczny, informatyka, fiszki, kursy, słówka">
        <meta name="author" content="Marcel Garczyk">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body>
      <?php
      if(isset($_SESSION["email"]) && isset($_SESSION["logged"])){
        require_once("../stale_elementy/navbarlog.php");
        }else{
        require_once("../stale_elementy/navbar.php");
        }
      ?>
      <div class="container">
            <div class="row">
                <div class="col-md-6 margin margin-top">
                  <div class="h_class">
                      <h4>Wybierz dział do nauki</h4><br>
                  </div>
                  <br>
                  <form class="text-center" name="form_dzial" method="post" action="">
                    <?php
                    if(isset($_POST["submit_dzial"])){
                      require_once("../pliki/logowanie/connect.php");
                      $_SESSION["dzial"] = $_POST["select_dzial"];
                      $query_ilosc_slow_dzial = "SELECT Count(Angielski) AS Ilosc_slow FROM slowo
                      INNER JOIN dzial
                      ON slowo.ID_dzial = dzial.ID_Dzial
                      WHERE dzial.Nazwa_dzial Like '$_SESSION[dzial]';";
                      $result_ilosc_slow_dzial = mysqli_query($connect, $query_ilosc_slow_dzial);
                      $row_ilosc_slow_dzial = mysqli_fetch_assoc($result_ilosc_slow_dzial);
                      $ilosc_slow_dzial = $row_ilosc_slow_dzial["Ilosc_slow"];
                      if($ilosc_slow_dzial == 0){
                        $_SESSION["pusty_dzial_fiszki"] = "W tym dziale nie dodano jeszcze słówek. Spróbuj ponownie później.<br><br>";
                      }else{
                      header("location: fiszki_nauka.php");
                        }
                      }
                     ?>
                    <select class="form-control" name="select_dzial"  >
                      <?php
                      require_once("../pliki/logowanie/connect.php");
                      $query_dzialy = "SELECT Nazwa_Dzial FROM dzial;";
                      $result_dzialy = mysqli_query($connect, $query_dzialy);
                      while($row_dzialy = mysqli_fetch_assoc($result_dzialy)){
                          echo "<option value='$row_dzialy[Nazwa_Dzial]'>Wybierz dział ".$row_dzialy["Nazwa_Dzial"]."</option>";
                      }
                       ?>
                    </select><br>
                    <?php if(isset($_SESSION["pusty_dzial_fiszki"])){
                        echo $_SESSION["pusty_dzial_fiszki"];
                        unset($_SESSION["pusty_dzial_fiszki"]);
                      }
                      ?>
                    <input type="submit" class="btn-primary btn-max float-right" name="submit_dzial" value="Rozpocznij naukę" /><br><br><br>
                  </form>
                  <a href="../index/index.php"><input type="button" class="btn-outline-primary btn-max float-right" value="Strona główna" /></a><br><br>
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
