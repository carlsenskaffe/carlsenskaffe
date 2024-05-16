<?php

require "vendor/autoload.php";
require "creds.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    function sanitizeInput($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Sanitize POST data
    $fornavn = sanitizeInput($_POST["fornavn"]);
    $efternavn = sanitizeInput($_POST["efternavn"]);
    $email = filter_var(sanitizeInput($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telefonNummer = sanitizeInput($_POST["telefonNummer"]);
    $eventType = sanitizeInput($_POST["eventType"]);
    $indendørsudendørs = sanitizeInput($_POST["indendørsudendørs"]);
    $eventDato = sanitizeInput($_POST["eventDato"]);
    $tidspunkt = sanitizeInput($_POST["tidspunkt"]);
    $guests = sanitizeInput($_POST["guests"]);
    $eventAdresse = sanitizeInput($_POST["eventAdresse"]);
    $beskrivEvent = sanitizeInput($_POST["beskrivEvent"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    $mail = new PHPMailer(true);


    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host ="smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = "carlsenskaffe@gmail.com";
        $mail->Password = $smtp_password;
        $mail->isHTML(false);

        $mail->setFrom("carlsenskaffe@gmail.com", $fornavn . ' ' . $efternavn);
        $mail->addAddress("carlsenskaffe@gmail.com", "Carlsens Kaffe");

        $mail->Subject = $fornavn . ' ' . $efternavn . ' - ' . $eventType . ' - ' . $eventDato;
        $mail->Body = 'Navn: ' . $fornavn . ' ' . $efternavn . "\n" . 'Email: ' . $email . "\n" . 'Telefon Nummer: ' . $telefonNummer . "\n" . 'Event type: ' . $eventType . "\n" . "Indendørs / Udendørs: " . $indendørsudendørs . "\n" . 'Event dato: ' . $eventDato . "\n" . 'Event adresse: ' . $eventAdresse . "\n" . 'Tidspunkt: ' . $tidspunkt . "\n" . 'Gæster: ' . $guests . "\n" . 'Beskrivelse af event: ' . $beskrivEvent;

        $mail->send();
        echo "Message sent successfully";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}

?>
