<?php
     session_start();
     if(isset($_GET["id_usun"])){
       $id_usun = $_GET["id_usun"];
       $id_uprawnienia = $_GET["id_uprawnienia"];
       $email_usun = $_GET["email_usun"];
       require_once("../pliki/logowanie/connect.php");
       if($email_usun == $_SESSION["email"]){
         require_once("blad_usuwania_uzytkownika_1.php");

       }elseif($id_uprawnienia == 2){
            require_once("blad_usuwania_uzytkownika_2.php");
       }else{
         require_once("usun_uzytkownika_potwierdzenie.php");
         if(isset($_POST["usun_ostatecznie"])){
           $query_usun_uzytkownik = "DELETE FROM uzytkownik WHERE ID_Uzytkownik = $id_usun";
           $result_usun_uzytkownik = mysqli_query($connect, $query_usun_uzytkownik);
           $query_usun_kursy = "DELETE FROM kurs WHERE ID_uzytkownik = $id_usun";
           $result_usun_kursy = mysqli_query($connect, $query_usun_kursy);
           mysqli_close($connect);
           header("location: wyswietl_uzytkownikow.php");
         }
       }

     }

 ?>
