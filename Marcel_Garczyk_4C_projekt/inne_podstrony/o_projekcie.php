<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>O projekcie</title>
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
      ?>
      <div class="container login-container">
          <div class="row">
              <div class="col-lg-12 margin" style="margin-top: 15vh;">
                  <div class="h_class_outline">
                      <h4>O stronie</h4><br>
                  </div><br>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-6 margin">
                  <div class="h_class">
                      <h4>Cel</h4><br>
                  </div><br>
                    <div class="col-md-12 display_div" style="text-align: justify;">
                      Strona ma na celu umożliwić naukę słówek z języka angielskiego dotyczących różnych zagadnień związanych z informatyką.
                    </div><br>
                    <div class="h_class">
                        <h4>Podział materiału</h4><br>
                    </div><br>
                    <div class="col-md-12 display_div" style="text-align: justify;">
                       Materiał będzie podzielony na działy zgodne z programem nauczania m.in Systemy Operacujne, Urządzenia Techniki Komputerowej czy Witryny i Aplikacje.
                    </div><br>
                </div>
                <div class="col-lg-6 margin">
                    <div class="h_class">
                        <h4>Możliwości</h4><br>
                    </div><br>
                      <div class="col-md-12 display_div" style="text-align: justify;">
                          Nauka będzie realizowana za pomocą fiszek oraz kursów tworzonych przez użutkowników w oparicu o bazę danych zawierającą słówka.
                         Zacznij naukę już dziś!
                      </div><br>
                      <div class="h_class">
                          <h4>Technologie</h4><br>
                      </div><br>
                      <div class="col-md-12 display_div" style="font-size: 17px; text-align: justify;">
                            Przy tworzeniu strony wykorzystano technologie takie jak HTML5,  Bootstrap 4,  jquery 3.4,  PHP 7.
                            Dzięki wykorzytaniu bootstrap strona jest responsywana.
                      </div><br>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 margin">
                      <a href="../inne_podstrony/kontakt.php"><input type="button" class="btn-primary btn-max" value="Skontaktuj się"/></a><br><br>
                      <a href="../index/index.php"><input type="button" class="btn-outline-primary btn-max" value="Strona główna"/></a><br><br>
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
