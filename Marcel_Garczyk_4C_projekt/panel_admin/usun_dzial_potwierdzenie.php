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
                Czy napewno chcesz usunąć dzial <?php echo $nazwa_dzial ?>? Pamiętaj jest to decyzja nieodwracalna która usunie
                wszystkie związane z działem słówka oraz utworzone przez użytkowników powiązane z tym działem kursy!
              </div><br>
              <form class="" method="post">
                <input type="submit" class="btn-primary btn-max" name="usun_ostatecznie" value="Usuń dział" />
              </form>
          </div>
      </div>
    </div>
  </body>
</html>
