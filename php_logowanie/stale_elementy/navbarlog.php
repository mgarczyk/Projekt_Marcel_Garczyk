<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../pliki/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
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
                    <a class="nav-link navbar-line" href="../fiszki/dzial_fiszki.php">Fiszki</a>
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
                        <span class="fas fa-sign-in-alt"></span><span class="white-space">Wyloguj</span>
                     </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link">
                            <span class="fas fa-user-plus white-space "></span><span class="white-space"><?php echo ' '.$_SESSION["username"]; ?></span>
                        </a>
                </li>
            </ul>
        </div>
</nav>
