<?php

$fornavn = $_POST["fornavn"];
$efternavn = $_POST["efternavn"];
$email = $_POST["email"];
$telefonNummer = $_POST["telefonNummer"];
$eventType = $_POST["eventType"];
$indendørsudendørs = $_POST["indendørsudendørs"];
$eventDato = $_POST["eventDato"];
$tidspunkt = $_POST["tidspunkt"];
$guests = $_POST["guests"];
$eventAdresse = $_POST["eventAdresse"];



require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host ="smtp.example.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "you@example.com";
$mail->Password = "password";

$mail->setFrom($email, $fornavn . ' ' . $efternavn);
$mail->addAdress("carlsenskaffe@gmail.com", "Carlsens Kaffe");

$mail->Subject = $subject;
$mail->Body = 'Navn: ' . $fornavn . ' ' . $efternavn . "\n" . 'Email: ' . $email;

$mail->send();

?>