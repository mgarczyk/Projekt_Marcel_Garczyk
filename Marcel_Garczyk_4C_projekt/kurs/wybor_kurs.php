<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Wybierz kurs</title>
        <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
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
        if(isset($_POST["przycisk_wybor_kurs"])){
          $_SESSION["wybierz_kurs"] = $_POST["wybierz_kurs"];
          header("location: nauka_kurs.php");
        }
      ?>
      <div class="container">
            <div class="row">
                <div class="col-lg-6 margin margin-top">
                  <div class="h_class">
                      <h4>Wybierz kurs</h4><br>
                  </div>
                  <br>
                  <form class="text-center" name="form_wybor_kurs" method="post">
                    <?php require_once("../pliki/kursy/wybor_kurs_kod.php") ?>
                  <input type="submit" name="przycisk_wybor_kurs" class="btn-primary btn-max" value="Rozpocznij naukę" /><br><br>
                  </form>
                  <a href="tworzenie_kurs.php"><input type="button" class="btn-primary btn-max" value="Stwórz inny kurs" /></a><br><br>
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
