<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Strona główna</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../pliki/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <meta charset="UTF-8">
        <meta name="description" content="Nauka angielskiego technicznego dla informatyków.">
        <meta name="keywords" content="angielski techniczny, informatyka, fiszki, kursy, słówka">
        <meta name="author" content="Marcel Garczyk">
    </head>
    <body  style="background-image: url(tlo3.jpg);">
      <?php
      if(isset($_SESSION["username"])){
        require_once("../stale_elementy/navbarlog.php");
        }else{
        require_once("../stale_elementy/navbar.php");
        }
      ?>
      <div class="container">
            <div class="row">
                <div class="col-md-12 margin" style="margin-top: 30vh;">
                <div class="row">
                <div class="col-md-3 margin div-none-background text-center">
                  <h3>Dowiedz się więcej</h3><br>
                  <p class="text-justify">Sprawdź zakładkę o stronie, żeby dowiedzieć się więcej o projekice który tworzę. Możesz się także ze mną skontaktować</p><br>
                  <a href="../inne_podstrony/o_projekcie.php"><input type="button" class="btn-primary btn-half" value="O stronie"></a>
                </div><br><br>
                <div class="col-md-3 margin div-none-background text-center">
                    <h3>Ucz się</h3><br>
                    <p class="text-justify">Możesz uczyć się za pomocą fiszek tworzonych przezemnie lub kursów sprawdzających pisownie</p><br>
                    <a href="../fiszki/dzial_fiszki.php"><input type="button" class="btn-primary btn-half" value="Zacznij naukę"></a>
                </div>
                <div class="col-md-3 margin div-none-background text-center">
                    <h3>Zarejstruj się</h3><br>
                    <p class="text-justify">Załóż darmowe konto i korzystaj z możliwości nauki setek słówek, które napewno w przyszłości Ci się przydadzą</p><br>
                    <a href="../logowanie/rejstracja.php"><input type="button" class="btn-primary btn-half" value="Zarejstruj się"></a>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_SESSION["username"])){
      require_once("../stale_elementy/footerlog.php");
      }else{
      require_once("../stale_elementy/footer.php");
    }
    ?>
    </body>
</html>
