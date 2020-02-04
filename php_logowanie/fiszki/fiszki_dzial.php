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
      if(isset($_SESSION["email"])){
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
                    <select class="form-control" name="select_dzial"  >
                      <option value="SO">Systemy Operacyjne</option>
                      <option value="UTK">Urządzenia Techniki Komputerowej</option>
                      <option value="SK">Sieci Komputerowe</option>
                    </select><br>
                    <a href="fiszki_nauka.php"><input type="button" class="btn-primary btn-max float-right" value="Rozpocznij naukę" /></a><br><br><br>
                  </form>
                  <a href="../index/index.php"><input type="button" class="btn-outline-primary btn-max float-right" value="Strona główna" /></a><br><br>
                </div>
              </div>
          </div>
          <?php
          if(isset($_SESSION["email"])){
            require_once("../stale_elementy/footerlog.php");
            }else{
            require_once("../stale_elementy/footer.php");
          }
          ?>
    </body>
</html>
