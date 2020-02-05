<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Kurs - nauka</title>
        <link rel="stylesheet" href="../bootstrap_itd/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <meta name="description" content="Nauka angielskiego technicznego dla informatyków.">
        <meta name="keywords" content="angielski techniczny, informatyka, fiszki, kursy, słówka">
        <meta name="author" content="Marcel Garczyk">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
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
                <div class="col-lg-6 margin margin-top">
                  <div class="h_class">
                      <h4>Wybierz kurs</h4><br>
                  </div>
                  <br>
                  <form class="text-center" name="form_nauka_kurs" method="post" action="">
                      <div class="col-md-12 h_class_outline">
                        <h4>Polski</h4>
                      </div><br>
                      <input class="form-control" type="text" name="sprawdz" placeholder="Wpisz tłumaczenie"><br>
                      <input type="submit" class="btn-primary btn-max" value="Potwierdź"/><br><br>
                      <input type="submit" class="btn-primary btn-max" value="Zapisz wynik i zakończ"/><br><br>
                  </form>
                  <a href="wybor_kurs.php"><input type="button" class="btn-primary btn-max" value="Wybierz inny kurs" /></a><br><br>
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
