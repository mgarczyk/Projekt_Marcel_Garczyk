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
        if(isset($_POST["przycisk_wybor_dzialanie"])){
          if($_POST["select_dzialanie"] == "WU"){
              header("location: wyswietl_uzytkownikow.php");
          }elseif($_POST["select_dzialanie"] == "WS"){
              header("location: wyswietl_slowa.php");
          }elseif($_POST["select_dzialanie"] == "WD"){
              header("location: wyswietl_dzial.php");
          }elseif($_POST["select_dzialanie"] == "DS"){
              header("location: dodaj_slowo.php");
          }elseif($_POST["select_dzialanie"] == "DU"){
              header("location: dodaj_uzytkownika.php");
          }elseif($_POST["select_dzialanie"] == "DD"){
              header("location: dodaj_dzial.php");
        }
      }
      ?>
      <div class="container">
            <div class="row">
                <div class="col-lg-6 margin margin-top">
                  <div class="h_class">
                      <h4>Wybierz działanie</h4><br>
                  </div>
                  <br>
                  <form class="text-center" name="form_wybor_kurs" method="post">
                    <select class="form-control" name="select_dzialanie"  >
                      <option value="WU">Wyświetl użytkowników</option>
                      <option value="WS">Wyświetl słówka</option>
                      <option value="WD">Wyświetl działy</option>
                      <option value="DU">Dodaj użytkownika</option>
                      <option value="DS">Dodaj słówko</option>
                      <option value="DD">Dodaj dział</option>
                    </select><br>
                  <input type="submit" name="przycisk_wybor_dzialanie" class="btn-primary btn-max" value="Wykonaj" />
                  </form>
                  <br>
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
