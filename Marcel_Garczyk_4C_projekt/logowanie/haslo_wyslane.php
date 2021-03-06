<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Logowanie</title>
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
            <div class="col-lg-6 margin margin-top">
              <div class="h_class">
                  <h4>Zmiana hasła</h4><br>
              </div><br>
              <div class="col-lg-12 display_div" style="text-align: justify;">
                 Na podany adres email została wysłana wiadomość dotycząca zmiany hasła.
              </div><br>
              <?php if($_SESSION["potwierdzenie"] != 1) echo '<a href="logowanie.php"><input type="button" class="btn-outline-primary btn-max" value="Powrót do logowania"/></a><br><br>';
                else{
                  echo '<a href="potwierdzenie_rejstracji.php"><input type="button" class="btn-outline-primary btn-max" value="Powrót do potwierzenia rejstracji"/></a><br><br>';
                }
                ?>
          </div>
      </div>
    </div>
  </body>
</html>
