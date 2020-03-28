<?php
     session_start();
     if(isset($_GET["id_dzial"])){
       $id_dzial = $_GET["id_dzial"];
       $nazwa_dzial = $_GET["nazwa_dzial"];
       require_once("../pliki/logowanie/connect.php");
       require_once("usun_dzial_potwierdzenie.php");
        if(isset($_POST["usun_ostatecznie"])){
           $query_usun_slowa = "DELETE FROM slowo WHERE ID_Dzial = $id_dzial;";
           $result_usun_slowa = mysqli_query($connect, $query_usun_slowa);
           $query_usun_kursy = "DELETE FROM kurs WHERE ID_dzial = $id_dzial";
           $result_usun_kursy = mysqli_query($connect, $query_usun_kursy);
           $query_usun_dzial = "DELETE FROM dzial WHERE ID_Dzial = $id_dzial";
           $result_usun_dzial = mysqli_query($connect, $query_usun_dzial);
           mysqli_close($connect);
           header("location: admin.php");
         }
       }
 ?>
