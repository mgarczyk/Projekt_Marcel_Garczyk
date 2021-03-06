<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../pliki/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <meta charset="UTF-8">
</head>
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
