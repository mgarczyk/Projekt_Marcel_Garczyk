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
        font-size: 40px;
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
  <body>
  <?php require_once("../stale_elementy/navbar.php") ?>
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
                  <div class="card__face card__face--front">front</div>
                  <div class="card__face card__face--back">back</div>
                </div>
              </div>
        </div>
        <br>
        <button type="button" class="btn btn-primary btn-max">Kolejne słówko</button><br><br>
        <button type="button" class="btn btn-primary btn-max">Poprzednie słówko</button><br><br>
        <a href="fiszki_dzial.php"><button type="button" class="btn-outline-primary btn-max">Wybierz inny dział</button></a>
      </div>
    </div>
  </div>
</body>
<?php require_once("../stale_elementy/footer.php") ?>
<script>
        var card = document.querySelector('.card');
        card.addEventListener( 'click', function() {
          card.classList.toggle('is-flipped');
        });
</script>
</html>
