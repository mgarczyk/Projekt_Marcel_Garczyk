<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/logo_rej.css">
    </head>
    <body>
      <?php require_once("../stale_elementy/navbar.php") ?>
      <div class="container login-container">
            <div class="row">
                <div class="col-lg-6 login-form-1 margin">
                  <div class="h_class">
                      <h4>Wybierz dział do nauki</h4><br>
                  </div>
                  <br>
                  <form class="text-center" name="form_dzial" method="post" action="">
                    <select class="form-control" name="select_dzial" >
                      <option value="SO">Systemy Operacyjne</option>
                      <option value="UTK">Urządzenia Techniki Komputerowej</option>
                      <option value="SK">Sieci Komputerowe</option>
                    </select><br>
                    <a href="fiszki_nauka.html"><input type="button" class="btn-primary" value="Rozpocznij naukę" /></a><br><br>
                    <a href="index.php"><input type="button" class="btn-outline-primary" value="Strona główna" /></a><br><br>
                  </form>
                </div>
              </div>
          </div>
          <?php require_once("../stale_elementy/footer.php") ?>
    </body>
</html>
