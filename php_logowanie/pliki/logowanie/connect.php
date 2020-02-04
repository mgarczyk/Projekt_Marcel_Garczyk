<?php
$connect = new mysqli('localhost', 'root', '', 'marcel_garczyk_baza');
if (!$connect) {
    die(mysqli_connect_error());
}
 ?>
