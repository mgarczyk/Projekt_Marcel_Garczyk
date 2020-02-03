<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Rejstracja</title>
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
                      <h4>Rejstracja</h4><br>
                  </div>
                  <br>
                  <form class="text-center" method="post">
                    <input type="email" class="form-control form-rounded" placeholder="Podaj e-mail" value="" name="email"/><br>
                    <input type="password" class="form-control" placeholder="Podaj hasło" value="" name="password" /><br>
                    <input type="password" class="form-control" placeholder="Powtórz hasło" value="" name="password_again"/><br>
                    <input type="submit" class="btn-primary btn-max" value="Zarejstruj" /><br><br>
                    <a href="logowanie.php"><input type="button" class="btn-outline-primary btn-max" value="Masz już konto? Zaloguj się" /></a><br><br>
                    <?php
                      require_once('../pliki/logowanie/rejstracja_kod.php');
                     ?>

                </div>
              </div>
          </div>
    </body>
</html>
