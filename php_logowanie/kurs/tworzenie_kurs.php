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
      if(isset($_SESSION["username"])){
        require_once("../stale_elementy/navbarlog.php");
        }else{
        require_once("../stale_elementy/navbar.php");
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
                      <option value="SO">Systemy Operacyjne</option>
                      <option value="UTK">Urządzenia Techniki Komputerowej</option>
                      <option value="SK">Sieci Komputerowe</option>
                    </select><br>
                    <select class="form-control" name="select_kurs_jezyk_z">
                      <option value="Polski">Polski</option>
                      <option value="Angielski">Angielski</option>
                    </select><br>
                    <select class="form-control" name="select_kurs_jezyk_na">
                        <option value="Polski">Polski</option>
                        <option value="Angielski">Angielski</option>
                    </select><br>
                    <input type="submit" class="btn-primary btn-max" value="Stwórz nowy kurs"/><br><br>
                  </form>
                  <a href="wybor_kurs.php"><input type="button" class="btn-outline-primary btn-max" value="Przejdź do wyboru"></a><br><br>
                  <a href="../index/index.php"><input type="button" class="btn-primary btn-max" value="Strona główna" /></a><br><br>
                </div>
              </div>
          </div>
          <?php
          if(isset($_SESSION["username"])){
            require_once("../stale_elementy/footerlog.php");
            }else{
            require_once("../stale_elementy/footer.php");
          }
          ?>
    </body>
</html>
