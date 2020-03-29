<?php session_start();
$_SESSION["potwierdzenie"] = 1;
?>
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
                <div class="col-lg-6 login-form-1 margin margin-top">
                  <div class="h_class">
                      <h4>Potwierdzenie rejstracji</h4><br>
                  </div>
                  <br>
                  <div class="col-lg-12 display_div" style="text-align: justify;">
                     Zaloguj się na założone wcześniej konto, aby potwierdzić rejstrację i móc korzystać z serwisu bez ogranieczeń.
                  </div><br>
                  <form class="text-center" method="post">
                    <input type="email" class="form-control" placeholder="E-mail" value="" name="email" /><br>
                    <input type="password" class="form-control" placeholder="Hasło" value="" name="password" /><br>
                    <input type="submit" class="btn-primary btn-max" value="Zaloguj" /><br><br>
                    <a href="haslo.php"><input type="button" class="btn-primary btn-max" value="Zapomniałeś hasła?" /></a><br><br>
                    <?php require_once("../pliki/logowanie/rejstracja_potwierdz.php") ?>
                  </form>
                </div>
              </div>
          </div>
    </body>
</html>
