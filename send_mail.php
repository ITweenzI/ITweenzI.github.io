<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Si installé avec Composer
// require 'phpmailer/src/PHPMailer.php'; // Si installé manuellement
// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/SMTP.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$mail = new PHPMailer(true);

try {
    // 📌 Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Serveur SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'lucashattry@gmail.com'; // Ton adresse Gmail
    $mail->Password = 'jels xuix atkn myba'; // Ton mot de passe d'application Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // 📌 Paramètres de l'email
    $mail->setFrom($_POST['email'], $_POST['name']); // Expéditeur
    $mail->addAddress('lucashattry@gmail.com'); // Destination

    // 📌 Contenu de l'email
    $mail->isHTML(true);
    $mail->Subject = 'Nouveau message de contact';
    $mail->Body    = "<strong>Nom :</strong> {$_POST['name']}<br>
                      <strong>Email :</strong> {$_POST['email']}<br>
                      <strong>Message :</strong> {$_POST['message']}";

    // 📌 Envoyer l'email
    $mail->send();
    echo "✅ Message envoyé avec succès !";
} catch (Exception $e) {
    echo "❌ Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
}
?>
