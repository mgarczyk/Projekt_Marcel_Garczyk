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
              <div class="col-lg-12 display_div" style="text-align: justify;">
                Czy napewno chcesz usunąć użytkownika <?php echo $email_usun ?>
              </div><br>
              <form class="" method="post">
                <input type="submit" class="btn-primary btn-max" name="usun_ostatecznie" value="Usuń użytkownika" />
              </form>
          </div>
      </div>
    </div>
  </body>
</html>
