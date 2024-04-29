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
$beskrivEvent = $_POST["beskrivEvent"];



require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

/* $mail->SMTPDebug = SMTP::DEBUG_SERVER; */

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host ="smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "carlsenskaffe@gmail.com";
$mail->Password = "";
$mail->isHTML(false);

$mail->setFrom("carlsenskaffe@gmail.com", $fornavn . ' ' . $efternavn);
$mail->addAddress("carlsenskaffe@gmail.com", "Carlsens Kaffe");

$mail->Subject = $eventType . ' ' . $eventDato;
$mail->Body = 'Navn: ' . $fornavn . ' ' . $efternavn . "\n" . 'Email: ' . $email . "\n" . 'Telefon Nummer: ' . $telefonNummer . "\n" . 'Event type: ' . $eventType . "\n" . "Indendørs / Udendørs: " . $indendørsudendørs . "\n" . 'Event dato: ' . $eventDato . "\n" . 'Event adresse: ' . $eventAdresse . "\n" . 'Tidspunkt: ' . $tidspunkt . "\n" . 'Gæster: ' . $guests . "\n" . 'Beskrivelse af event: ' . $beskrivEvent;

$mail->send();

?>
