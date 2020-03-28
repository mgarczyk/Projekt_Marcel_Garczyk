<?php
     if(isset($_GET["id_slowo"])){
       $id_slowo = $_GET["id_slowo"];
       require_once("../pliki/logowanie/connect.php");
       $query_usun_slowo = "DELETE FROM slowo WHERE ID_Slowo = $id_slowo";
       $result_usun_slowo = mysqli_query($connect, $query_usun_slowo);
       mysqli_close($connect);
       header("location: wyswietl_slowa.php");
     }

 ?>
