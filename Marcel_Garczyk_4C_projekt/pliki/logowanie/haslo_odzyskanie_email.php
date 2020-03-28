<?php
require_once('../pliki/logowanie/connect.php');
if(!empty($_POST["email"])){
$email = $_POST["email"];
$query = "SELECT Login FROM uzytkownik WHERE Login = '$email';";
$result = mysqli_query($connect, $query);   //sprawdzenie czy dany email nie znajduje się już w bazie danych
if (mysqli_num_rows($result)==1){
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
$mail->Subject = 'Odzyskaj haslo';
$mail->Body='Uruchom to hiperlacze, aby odzyskac haslo:
<a href="localhost/Marcel_Garczyk_4C_projekt/logowanie/nowe_haslo.php">
  localhost/Marcel_Garczyk_4C_projekt/logowanie/nowe_haslo.php
</a>';
$mail->AddAddress("$email");
$mail->Send();
header("location: ../logowanie/haslo_wyslane.php");
}
else echo "<h7>Konta o podanym adresie email nie istnieje. Załóż konto lub sprawdź poprawność wpisanych danych</h7>";
}
?>
