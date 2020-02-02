<!DOCTYPE html>
   <head>
        <meta charset="utf-8">
        <title>Kontakt</title>
        <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <meta name="description" content="Nauka angielskiego technicznego dla informatyków.">
        <meta name="keywords" content="angielski techniczny, informatyka, fiszki, kursy, słówka">
        <meta name="author" content="Marcel Garczyk">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <?php require_once("../stale_elementy/navbar.php") ?>
      <div class="container">
            <div class="row">
                <div class="col-lg-6  margin margin-top">
                  <div class="h_class">
                      <h4>Kontakt</h4><br>
                  </div><br>
                  <div class="col-md-12 display_div">
                    <div class="row">
                        <div class="col-md-12 text-center margin">
                          <input id="tworca" type="hidden" value="Marcel Garczyk">
                          <p>Twórca: Marcel Garczyk</p>
                          <button class="btn-primary btn-sm"  onclick="copy_tworca()">Kopiuj</button><br>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-12 col-sm-6 text-center margin">
                              <input id="email"   type="hidden" value="mail@mail.com">
                              <p>E-mail: mail@mail.com</p>
                            <button class="btn-primary btn-sm" onclick="copy_email()">Kopiuj</button><br>
                          </div>
                        </div>
                        <hr>
                        <div class="row brd-bottom">
                            <div class="col-md-12 text-center margin">
                                <input id="telefon"  type="hidden" value="123 456 789">
                                <p>Numer telefonu: 123 456 789</p>
                              <button class="btn-primary btn-sm"  onclick="copy_telefon()">Kopiuj</button><br>
                            </div>
                          </div>
                          <hr>
                          <div class="row brd-bottom">
                              <div class="col-md-12 text-center margin">
                                <input id="github"  type="hidden" value="https://github.com/mgarczyk">
                                <p>Github: mgarczyk </p>
                                <button class="btn-primary btn-sm" onclick="copy_github()">Kopiuj</button><br>
                              </div>
                            </div>
                            <hr>
                </div>
                <br>
                <a href="../index/index.php"><input type="button" class="btn-primary btn-max" value="Strona główna"/></a><br><br>
                </div>
            </div>
      </div>
      <?php require_once("../stale_elementy/footer.php") ?>
    </body>
    <script>
       function copy_tworca() {
          var copyText = document.getElementById("tworca");
          copyText.type = 'text';
          copyText.select();
          document.execCommand("copy");
          copyText.type = 'hidden';
        }
        function copy_email() {
          var copyText = document.getElementById("email");
          copyText.type = 'text';
          copyText.select();
          document.execCommand("copy");
          copyText.type = 'hidden';
        }
        function copy_telefon() {
          var copyText = document.getElementById("telefon");
          copyText.type = 'text';
          copyText.select();
          document.execCommand("copy");
          copyText.type = 'hidden';
        }
        function copy_github() {
          var copyText = document.getElementById("github");
          copyText.type = 'text';
          copyText.select();
          document.execCommand("copy");
          copyText.type = 'hidden';
        }
        </script>

</html>
