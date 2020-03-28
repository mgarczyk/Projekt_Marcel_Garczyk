<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Logowanie</title>
        <link rel="stylesheet" href="../pliki/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <meta name="description" content="Nauka angielskiego technicznego dla informatyków.">
        <meta name="keywords" content="angielski techniczny, informatyka, fiszki, kursy, słówka">
        <meta name="author" content="Marcel Garczyk">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style media="screen">
          table{
            border: 1.5px black solid;
          }
          td{
            border: solid #108E84 2px;
            color: black;
            background-color: white;
            padding: 2px 5px 2px 5px;
            text-align: center;
          }
          a{
            color: #108E84;
            text-decoration: none;
          }
        </style>
    </head>
    <body>
      <div class="container login-container">
            <div class="row">
                <div class="col-lg-6 login-form-1 margin margin-top">
                  <div class="h_class">
                      <h4>Wyświetlanie użytkowników</h4><br>
                  </div>
                  <br>
                    <?php
                        require_once("../pliki/logowanie/connect.php");
                        $query_slowo = "SELECT * FROM slowo
                        INNER JOIN dzial
                        ON slowo.ID_dzial = dzial.ID_dzial";
                        $result_slowo = mysqli_query($connect, $query_slowo);
                        echo "<table>";
                        echo <<< ETYKIETA
                        <tr>
                          <td>ID_Slowo</td>
                          <td>Polski</td>
                          <td>Angielski</td>
                          <td>Nazwa_dzial</td>
                          <td>Usuń</td>
                        </tr>
                        ETYKIETA;
                        while($row_slowo = mysqli_fetch_assoc($result_slowo)){
                          echo <<< ETYKIETA
                          <tr>
                            <td>$row_slowo[ID_Slowo]</td>
                            <td>$row_slowo[Polski]</td>
                            <td>$row_slowo[Angielski]</td>
                            <td>$row_slowo[Nazwa_Dzial]</td>
                            <td><a href="usun_slowo.php?id_slowo=$row_slowo[ID_Slowo]">Usuń_słowo</a></td>
                          </tr>
                          ETYKIETA;
                        }
                        echo "</table>";
                        echo "<br>";
                        mysqli_close($connect);
                     ?>
                    <a href="admin.php"><input type="button" class="btn-primary btn-max" value="Wybierz inne działanie" /></a><br><br>
                    <a href="../index/index.php"><input type="button" class="btn-outline-primary btn-max" value="Strona główna"/></a><br><br>
                  </form>
                </div>
              </div>
          </div>
    </body>
</html>
