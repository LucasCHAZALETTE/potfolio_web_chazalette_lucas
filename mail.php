<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit;
}

$email  = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$object = trim($_POST['object'] ?? '');
$msg    = trim($_POST['msg'] ?? '');
$check  = intval($_POST['check'] ?? 0);


if ($check !== 4) {
    die("Erreur : vérification anti-robot incorrecte.");
}


if (!$email || empty($object) || empty($msg)) {
    die("Erreur : champs invalides.");
}


$to = "chazalette.luas@gmail.com"; 
$subject = "Contact site : " . $object;
$message = "Email : $email\n\nMessage :\n$msg";
$headers = "From: $email\r\nReply-To: $email";


if (mail($to, $subject, $message, $headers)) {
    echo "Succès";
} else {
    echo "Erreur lors de l'envoi";
}
