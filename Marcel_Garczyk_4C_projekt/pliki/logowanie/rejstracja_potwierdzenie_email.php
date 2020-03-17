<?php
session_start();
require_once('PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'marcelgarczyk.projekt@gmail.com';
$mail->Password = 'Zaq1@wsx';
$mail->SetFrom('no-reply@projekt.pl');
$mail->Subject = 'Potwierdz rejstracje';
$mail->Body='Uruchom to hiperlacze, aby potwierdzic rejstracje:
<a href="localhost/Marcel_Garczyk_4C_projekt/logowanie/potwierdzenie_rejstracji.php">
  localhost/Marcel_Garczyk_4C_projekt/logowanie/potwierdzenie_rejstracji.php
</a>';
$email = $_SESSION["email"];
$mail->AddAddress("$email");
$mail->Send();
header("location: ../../logowanie/potwierdzenie_wyslane.php")
?>
