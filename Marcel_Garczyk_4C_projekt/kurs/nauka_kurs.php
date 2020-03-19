<?php session_start(); ?>
<!DOCTYPE html>
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
    </head>
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


      <script>
      $(document).ready(function(){
        var ile = Number(document.getElementById('hidden_ilosc').value);
        var kurs = document.getElementById('hidden_kurs').value;
                $("#next").click(function(){
                    var angielski_uzytkownik = $('#slowo_angielski').val();
                    document.getElementById('slowo_angielski').value = "";
                      ile = ile + 1;
                      if(ile!=0){
                        document.getElementById('info').hidden = true;
                        document.getElementById('slowo_angielski').hidden = false;
                      }
                      //alert(ile); //alert który rekord
                      $("#polski").load("../pliki/kursy/nauka_kurs_kod.php",{ //rekord późniejszy
                        ilenew: ile,
                        kursnew: kurs,
                        angielski_uzytkowniknew: angielski_uzytkownik,
                      });
                      var angielski_baza = document.getElementById('angielski_baza').value;
                      var ilosc_slow_baza = document.getElementById('ilosc_slow').value;
                      if(angielski_baza == angielski_uzytkownik){
                        alert("good");
                      }else{
                        alert("Odpowiedziałeś źle");
                        document.getElementById('polski').innerHTML = 'Kliknij potwierdź, aby spróbować ponownie.';
                        document.getElementById('slowo_angielski').hidden = true;
                        ile = ile - 2;
                      }
                      if(ile > ilosc_slow_baza){
                        document.getElementById('slowo_angielski').hidden = true;
                        document.getElementById('next').hidden = true;
                      }
                    });

                });
      </script>
      <?php
      $connect = new mysqli('localhost', 'root', '', 'marcel_garczyk_baza');
      if (!$connect) {
          die(mysqli_connect_error());
      }
      $kurs = $_SESSION["wybierz_kurs"];
      $email = $_SESSION["email"];
      $query_ilosc = "SELECT Ilosc_slow
      FROM kurs
      WHERE ID_dzial = (SELECT ID_dzial FROM dzial WHERE Nazwa_dzial LIKE '$kurs')
      AND ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login LIKE '$email');";
      $result_ilosc = mysqli_query($connect, $query_ilosc);
      $row_ilosc = mysqli_fetch_assoc($result_ilosc);
      $ilosc = $row_ilosc["Ilosc_slow"];
      echo "<input type='hidden' value='$ilosc' id='hidden_ilosc'>";
      echo "<input type='hidden' value='$kurs' id='hidden_kurs'>";
      ?>
      <div class="container">
            <div class="row">
                <div class="col-lg-6 margin margin-top">
                  <div class="h_class">
                      <h4>Wybierz kurs</h4><br>
                  </div>
                  <br>
                  <form class="text-center" name="form_nauka_kurs" method="post" action="">
                      <div class="col-md-12 h_class_outline"  style="text-align: center; margin-bottom: 20px;">
                        <h4 id="polski" >Polski</h4>
                      </div>
                      <input class="form-control" type="text" placeholder="Wpisz tłumaczenie" id="slowo_angielski" hidden style="margin-bottom: 20px;">
                      <input type="button" class="btn-primary btn-max" value="Potwierdź" style="margin-bottom: 20px" id="next"/>
                  </form>
                  <div class="col-md-12 display_div" style="font-size: 16px; margin-bottom: 20px;" id="info">
                      Klkinij raz przycisk potwierdź, aby rozpocząć wykonanie kursu.
                    </div>
                  <a href="wybor_kurs.php"><input type="button" class="btn-outline-primary btn-max" value="Zakończ i wybierz inny kurs" /></a><br><br>
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
</html>
