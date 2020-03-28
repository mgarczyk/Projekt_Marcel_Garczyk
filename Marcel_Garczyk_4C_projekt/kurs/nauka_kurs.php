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
                          <?php
                          if($_SESSION["uprawnienia"]==2){
                            echo <<< ADMIN
                            <li class="nav-item">
                                    <a class="nav-link navbar-line" href="../panel_admin/admin.php">Panel adminstratora</a>
                            </li>
                            ADMIN;
                          };
                        ?>
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
      <?php
      if($_SESSION["wybierz_kurs"] == ""){
        header("location: wybor_kurs.php");  //jezeli ta zmienna sesyjna jest pusta uzytkownik musi wybrać kurs
      }
      $connect = new mysqli('localhost', 'root', '', 'marcel_garczyk_baza');
      if (!$connect) {
          die(mysqli_connect_error());
      }
      $kurs = $_SESSION["wybierz_kurs"];
      $email = $_SESSION["email"];
      //UAKTALNIJ STATUS KURSU NA Aktywny_wykonywany
      $query_status = "UPDATE kurs SET ID_status = (SELECT ID_status FROM status_kursu WHERE Nazwa_status LIKE 'Aktywny_wykonywany')
      WHERE ID_dzial = (SELECT ID_dzial FROM dzial WHERE Nazwa_dzial LIKE '$kurs')
      AND ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login LIKE '$email');";
      $result_status = mysqli_query($connect, $query_status);
      //ILOSC slow przerobionych w danym KURSIE (postęp)
      $query_ilosc_kurs = "SELECT Ilosc_slow
      FROM kurs
      WHERE ID_dzial = (SELECT ID_dzial FROM dzial WHERE Nazwa_dzial LIKE '$kurs')
      AND ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login LIKE '$email');";
      $result_ilosc_kurs = mysqli_query($connect, $query_ilosc_kurs);
      $row_ilosc_kurs = mysqli_fetch_assoc($result_ilosc_kurs);
      $ilosc_kurs = $row_ilosc_kurs["Ilosc_slow"];
      //koniec
      //ILOSC slow z danego DZIALU
      $query_ilosc_slow_dzial = "SELECT Count(Angielski) AS Ilosc_slow FROM slowo
      INNER JOIN dzial
      ON slowo.ID_dzial = dzial.ID_Dzial
      WHERE dzial.Nazwa_dzial Like '$kurs';";
      $result_ilosc_slow_dzial = mysqli_query($connect, $query_ilosc_slow_dzial);
      $row_ilosc_slow_dzial = mysqli_fetch_assoc($result_ilosc_slow_dzial);
      $ilosc_slow_dzial = $row_ilosc_slow_dzial["Ilosc_slow"];
      //koniec
      //przechowanie wartosci kurs_dzail i ilosc_slow w inputach, by można było je pobrać w jQuery
      echo "<input type='hidden' value='$ilosc_kurs' id='hidden_ilosc_kurs'>";
      echo "<input type='hidden' value='$ilosc_slow_dzial' id='hidden_ilosc_dzial'>";
      echo "<input type='hidden' value='$kurs' id='hidden_kurs'>";
      //UAKTALNIJ STATUS kusu na Aktywny_niewykonywany
      if(isset($_POST["zakoncz_kurs"])){
          $query_status = "UPDATE kurs SET ID_status = (SELECT ID_status FROM status_kursu WHERE Nazwa_status LIKE 'Aktywny_niewykonywany')
          WHERE ID_dzial = (SELECT ID_dzial FROM dzial WHERE Nazwa_dzial LIKE '$kurs')
          AND ID_uzytkownik = (SELECT ID_uzytkownik FROM uzytkownik WHERE Login LIKE '$email');";
          $result_status = mysqli_query($connect, $query_status);
          header("location: wybor_kurs.php");
        }
        ?>
      <script>
      //Skrypt odpowiada za pokazywanie słówek polskich i sprawdzanie czy podane przez użytkownika odpowiadające słówko po angielsku jest prawidłowe.
      $(document).ready(function(){
        var ile = Number(document.getElementById('hidden_ilosc_kurs').value); //popranie ilości słowek z uktyrgo inputa
        if(ile >= 1) ile = ile - 1; //jeśli pobrany licznik jest większy od 1 to musimy go zmniejszyć o jeden by wskazywał odpowiednie słowo
        var ilosc_slow_baza = Number(document.getElementById('hidden_ilosc_dzial').value); //popranie ilości słowek z uktyrgo inputa
        var kurs = document.getElementById('hidden_kurs').value; //pobranie dzialu
                $("#next").click(function(){ //jeśli klikniemy next to
                    var angielski_uzytkownik = $('#slowo_angielski').val(); //pobieramy słówko które podał użytkownik
                    document.getElementById('slowo_angielski').value = "";
                      ile = ile + 1; //zwiekszamy licznik
                      if(ile!=0){
                        document.getElementById('info').hidden = true; //ukrywanie odkrywanie przycisków i infomacji
                        document.getElementById('slowo_angielski').hidden = false;
                      }
                      //alert(ile); //alert który rekord
                      $("#polski").load("../pliki/kursy/nauka_kurs_kod.php",{ //otwieramy plik nauka_kurs_kod.php odpowiedzailny za pobranie słowka po polsku i angielsiego odpowiednika z bazy (polskie wyświetli się w divie o id="polski")
                        ilenew: ile, //przekazanie potrzebnych danych to jest numeru słówka, nazwy dzialu,
                        kursnew: kurs,
                      });
                      var angielski_baza = document.getElementById('angielski_baza').value; //pobranie słówka po angielsku z uktyteggo inputa  tworzeonego przez dołączony kod nauka_kurs_kod.php
                      if(angielski_baza == angielski_uzytkownik){ //sprawdzenie czy to co pobrał użytkownik zgadza się z tym co pobraliśmy z bazy
                        //jezeli się zgadza
                        document.getElementById('zakoncz_kurs').hidden = false;
                        $("#do_bazy").load("../pliki/kursy/uaktualnij_ilosc_slow_w_bazie.php",{ //otwarcie kodu odpowiedzailnego za uaktualnianie postpu kursu i zapis wartości licznika do bazy
                          ilenew: ile, //przkazanie danych to jest licznika, ilosci słów w bazie by nie pobierać jej po raz kolejny oraz nazyw dzialu
                          ilosc_slow_bazanew: ilosc_slow_baza,
                          kursnew: kurs,
                        });
                      }else{
                        //jeżli się nie zgadza
                        alert("Odpowiedziałeś źle"); //alert
                        document.getElementById('polski').innerHTML = 'Kliknij potwierdź, aby spróbować ponownie.'; //klikamy ponownie by ponowić próbę podania prawidłowego słówka
                        document.getElementById('slowo_angielski').hidden = true;
                        document.getElementById('zakoncz_kurs').hidden = true;
                        ile = ile - 2; //zmnejszamy licznik przez co ponownie będzie to samo słówko
                      }
                      if(ile >= ilosc_slow_baza + 1){ //jeżeli kończą się słówka, czyli podany warunek jest prawdziwy to ukrywamy przycisk kolejne słówko i uniemożliwiamy wpisywanie kolejnych słówek
                            document.getElementById('polski_div').hidden = true;
                            document.getElementById('info').innerHTML = "Kurs ten zostaje zakończony nie można go kontynuować. By, uczyć się dalej skorzystaj z fiszek dotyczących działu " + kurs + " lub utwórz nowy kurs dotyczący tego działu.";
                            document.getElementById('h_wyswietl').innerHTML = "<h4>Ukończono kurs " + kurs + "</h4>";
                            document.getElementById('info').hidden = false;
                            document.getElementById('slowo_angielski').hidden = true;
                            document.getElementById('next').hidden = true;
                            $("#do_bazy_2").load("../pliki/kursy/usun_kurs.php",{ //otwarcie kodu odpowiedzailnego za uaktualnianie postpu kursu i zapis wartości licznika do bazy
                                    kursnew: kurs,  //przkazanie danych to jest licznika, ilosci słów w bazie by nie pobierać jej po raz kolejny oraz nazyw dzialu

                            });

                        }

                    });
                });
      </script>

      <div class="container">
            <div class="row">
                <div class="col-lg-6 margin margin-top">
                  <div class="h_class" id="h_wyswietl">
                      <h4>Rozwiąż kurs</h4><br>
                  </div>
                  <div id="do_bazy"></div>
                  <div id="do_bazy_2"></div>
                  <br>
                  <form class="text-center" name="form_nauka_kurs" method="post" action="">
                      <div id = "polski_div" class="col-md-12 h_class_outline"  style="text-align: center; margin-bottom: 20px;">
                        <h4 id="polski" >Polski</h4>
                      </div>
                      <input class="form-control" type="text" placeholder="Wpisz tłumaczenie" id="slowo_angielski" hidden style="margin-bottom: 20px;">
                      <input type="button" class="btn-primary btn-max" value="Potwierdź" style="margin-bottom: 20px" id="next"/>
                  </form>
                  <div class="col-md-12 display_div" style="font-size: 16px; margin-bottom: 20px; text-align: justify;" id="info">
                      Klkinij raz przycisk potwierdź, aby rozpocząć wykonanie kursu.
                  </div>
                  <form class="" action="" method="post" name="zakoncz">
                      <input type="submit" class="btn-primary btn-max"  name="zakoncz_kurs" id="zakoncz_kurs" value="Zakończ i wybierz inny kurs">
                  </form>
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
                                        <?php
                                          if($_SESSION["uprawnienia"] == 2){
                                            echo '<li><a href="../panel_admin/admin.php">Kontakt</li></a>';
                                          }
                                         ?>
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
