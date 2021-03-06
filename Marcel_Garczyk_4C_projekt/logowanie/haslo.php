<?php session_start();

?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Odzyskaj hasło</title>
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
                      <h4>Resetowanie hasła</h4><br>
                  </div>
                  <br>
                  <form class="text-center" method="post">
                    <div class="col-md-12 display_div" style="font-size: 16px ;">
                      Wpisz swój adres e-mail, który był przez Ciebie użyty do rejestracji.
                      Wyślemy do Ciebie wiadomość e-mail umożliwiającą zresetowanie hasła.
                    </div><br>
                    <input type="email" class="form-control" placeholder="Podaj e-mail" value="" name="email" /><br>
                    <input type="submit" class="btn-primary btn-max" value="Wyślij"/><br><br>
                    <?php if(isset($_SESSION["potwierdzenie"]) && $_SESSION["potwierdzenie"] != 1) echo '<a href="logowanie.php"><input type="button" class="btn-primary btn-max" value="Powrót do logowania" /></a><br><br>';?>
                    <?php if(isset($_SESSION["potwierdzenie"]) && $_SESSION["potwierdzenie"] != 1)echo '<a href="../index/index.php"><input type="button" class="btn-outline-primary btn-max" value="Strona główna"/></a><br><br>';?>
                    <?php require_once("../pliki/logowanie/haslo_odzyskanie_email.php"); ?>
                  </form>
                </div>
              </div>
          </div>
    </body>
</html>
