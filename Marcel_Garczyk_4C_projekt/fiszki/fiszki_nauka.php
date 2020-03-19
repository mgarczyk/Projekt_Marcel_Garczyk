<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Fiszki - nauka</title>
    <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <meta name="description" content="Nauka angielskiego technicznego dla informatyków.">
    <meta name="keywords" content="angielski techniczny, informatyka, fiszki, kursy, słówka">
    <meta name="author" content="Marcel Garczyk">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>

      .scene {
         width: 100%;
        height: 250px;
        border: 1px solid #D0D8D9;
        margin: 40px 0;
        perspective: 600px;
          perspective: 800px;
        }

      .card {
        position: relative;
        width:   100%;
        height:  100%;
        cursor: pointer;
        transform-style: preserve-3d;
        transform-origin: center right;
        transition: transform 1s;
        border-radius: 1.5rem;
      }

      .card.is-flipped {
        transform: translateX(-100%) rotateY(-180deg);
      }

      .card__face {
        position: absolute;
        width: 100%;
        height: 100%;
        line-height: 260px;
        color: white;
        text-align: center;
        font-weight: bold;
        font-size: 30px;
        backface-visibility: hidden;
        border: solid 2px #108E84;
        border-radius: 1.5rem;

      }

      .card__face--front {
        background: white;
        color: #108E84;


      }

      .card__face--back {
        background: white;
        color: #108E84;
        transform: rotateY(180deg);
      }

      </style>
    </head>
  <script>
  var dzial_v;
  $(document).ready(function(){
    var ile = 0;
            $("#next").click(function(){
                ile = ile + 1;
                if(ile > 1) document.getElementById('before').hidden = false;
                //alert(ile); alert który rekord
                  $("#polski").load("../pliki/fiszki/kod_polski.php",{ //rekord późniejszy
                    ilenew: ile,
                  });
                  $("#angielski").load("../pliki/fiszki/kod_angielski.php",{ //rekord późniejszy
                    ilenew: ile,
                  });
                  var ilosc_slow_baza = document.getElementById('ilosc_slow').value;
                  if(ile >= ilosc_slow_baza) document.getElementById('next').hidden = true;
                });
                $("#before").click(function(){
                    ile = ile - 1;
                    if(ile <=1 ) document.getElementById('before').hidden = true;
                    //alert(ile); alert który rekord
                      $("#polski").load("../pliki/fiszki/kod_polski.php",{
                        ilenew: ile,
                      });
                      $("#angielski").load("../pliki/fiszki/kod_angielski.php",{ //rekord późniejszy
                        ilenew: ile,
                      });
                      var ilosc_slow_baza = document.getElementById('ilosc_slow').value;
                      if(ile <= ilosc_slow_baza) document.getElementById('next').hidden = false;
                    });
            });
  </script>
  <?php
    if(!empty($_POST["select_dzial"])) $_SESSION["dzial"] = $_POST["select_dzial"];
  ?>
  <body>
    <?php if(isset($_SESSION["email"]) && isset($_SESSION["logged"])){
        ?>
        <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="../index/index.php">Strona domowa</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarNavDropdown" class="navbar-collapse collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link navbar-line" href="../inne_podstrony/o_projekcie.php">O stronie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-line" href="../fiszki/fiszki_dzial.php">Fiszki</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link navbar-line" href="../kurs/tworzenie_kurs.php">Stwórz kurs</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link navbar-line" href="../kurs/wybor_kurs.php">Kontunuuj kurs</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link navbar-line" href="../inne_podstrony/kontakt.php">Kontakt</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link navbar-line" href="../pliki/logowanie/wyloguj.php">
                                <span class="fas fa-sign-in-alt"></span><span class="white-space"> Wyloguj</span>
                             </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link">
                                    <span class="fas fa-user-plus white-space "></span><span class="white-space"><?php echo ' '.$_SESSION["email"]; ?></span>
                                </a>
                        </li>
                    </ul>
                </div>
        </nav>
        <?php

        }else{

      ?>
      <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="../index/index.php">Strona domowa</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div id="navbarNavDropdown" class="navbar-collapse collapse">
                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                          <a class="nav-link navbar-line" href="../inne_podstrony/o_projekcie.php">O stronie</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link navbar-line" href="../fiszki/fiszki_dzial.php">Fiszki</a>
                      </li>
                      <li class="nav-item">
                              <a class="nav-link navbar-line" href="../logowanie/logowanie.php">Stwórz kurs</a>
                      </li>
                      <li class="nav-item">
                              <a class="nav-link navbar-line" href="../logowanie/logowanie.php">Kontunuuj kurs</a>
                      </li>
                      <li class="nav-item">
                              <a class="nav-link navbar-line" href="../inne_podstrony/kontakt.php">Kontakt</a>
                      </li>
                  </ul>
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link navbar-line" href="../logowanie/logowanie.php">
                              <span class="fas fa-sign-in-alt"></span><span class="white-space"> Logowanie</span>
                           </a>
                      </li>
                      <li class="nav-item">
                              <a class="nav-link navbar-line" href="../logowanie/rejstracja.php">
                                  <span class="fas fa-user-plus white-space"></span><span class="white-space"> Rejstracja</span>
                              </a>
                      </li>
                  </ul>
              </div>
      </nav>
    <?php } ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 margin margin-top">
          <div class="h_class">
                <h4>Fiszki</h4><br>
          </div>
          <br>
          <div class="col-lg-12">
              <div class="scene scene--card">
                  <div class="card">
                    <div class="card__face card__face--front" id="angielski">Kliknij kolejne słówko</div>
                    <div class="card__face card__face--back" id="polski">Kliknij kolejne słówko</div>
                  </div>
                </div>
          </div>
          <input type ="button" class="btn btn-primary btn-max" id="next" value="Kolejne słówko" style="margin-bottom: 20px;">
          <input type="button" class="btn btn-primary btn-max" id="before" value="Poprzednie słówko" hidden style="margin-bottom: 20px;">
          <a href="fiszki_dzial.php"><button type="button" class="btn-outline-primary btn-max">Wybierz inny dział</button></a>
        </div>
      </div>
    </div>


  <?php
  if(isset($_SESSION["email"])){
    ?>
    <footer id="sticky-footer" class="py-3 footer footer-margin">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-left">
                        <div class="footer-widget">
                        <div class="footer-title">Zacznij naukę</div>
                        <ul class="list-unstyled">
                            <li><a href="../fiszki/fiszki_dzial.php">Ucz się z fiszek</li></a>
                            <li><a href="../kurs/nauka_kurs.php">Kontyunuuj kurs</li></a>
                            <li><a href="../kurs/tworzenie_kurs.php">Stwórz kurs</li></a>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-4 text-left">
                        <div class="footer-widget">
                            <div class="footer-title">Dowiedz się więcej</div>
                            <ul class="list-unstyled">
                                <li><a href="../inne_podstrony/o_projekcie.php">O stronie</li></a>
                                <li><a href="../inne_podstrony/kontakt.php">Kontakt</li></a>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 text-left">
                        <div class="footer-widget">
                            <div class="footer-title">Zalogowano jako</div>
                            <ul class="list-unstyled">
                              <li><a style="border: 0px;"><?php echo ' '.$_SESSION["email"]; ?></a></li>
                              <li><a href="../pliki/logowanie/wyloguj.php">Wyloguj</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 margin small-footer text-center">Copyright @Marcel Garczyk 2019</div>
            </div>
        </div>
    </footer>
  <?php  }else{ ?>
    <footer id="sticky-footer" class="py-3 footer footer-margin">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-left">
                        <div class="footer-widget">
                        <div class="footer-title">Zacznij naukę</div>
                        <ul class="list-unstyled">
                            <li><a href="../fiszki/fiszki_dzial.php">Ucz się z fiszek</li></a>
                            <li><a href="../logowanie/logowanie.php">Kontyunuuj kurs</li></a>
                            <li><a href="../logowanie/logowanie.php">Stwórz kurs</li></a>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-4 text-left">
                        <div class="footer-widget">
                            <div class="footer-title">Dowiedz się więcej</div>
                            <ul class="list-unstyled">
                                <li><a href="../inne_podstrony/o_projekcie.php">O stronie</li></a>
                                <li><a href="../inne_podstrony/kontakt.php">Kontakt</li></a>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 text-left">
                        <div class="footer-widget">
                            <div class="footer-title">Zarejstruj się</div>
                            <ul class="list-unstyled">
                                <li><a href="../logowanie/rejstracja.php">Rejstracja</li></a>
                                <li><a href="../logowanie/logowanie.php">Logowanie</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 margin small-footer text-center">Copyright @Marcel Garczyk 2019</div>
            </div>
        </div>

    </footer>
  <?php } ?>

  </body>

  <script>
          var card = document.querySelector('.card');
          card.addEventListener( 'click', function() {
            card.classList.toggle('is-flipped');
          });
  </script>
</html>
