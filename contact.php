<?php
// contact.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json; charset=utf-8');

// ==== CONFIG ====
// Mode : Mailtrap (environnement de test, mails visibles sur mailtrap.io)
const USE_PHPMAILER = true;

const SMTP_HOST   = 'sandbox.smtp.mailtrap.io';
const SMTP_PORT   = 2525;
const SMTP_SECURE = 'tls';
const SMTP_USER   = '545db02ab8978c'; // ton Username Mailtrap
const SMTP_PASS   = '4bf76932ea8c1b'; // ton Password Mailtrap

// Adresse de destination (celle qui reçoit le message)
const TO_EMAIL = 'lreda2801@mail.com';
const TO_NAME  = 'Reda Lakhledj';

// ==== FONCTIONS UTILES ====
function json_out($ok, $payload = []) {
    http_response_code($ok ? 200 : 400);
    echo json_encode(['ok' => $ok] + $payload, JSON_UNESCAPED_UNICODE);
    exit;
}
function sanitize($s){ return trim((string)$s); }
function looks_like_header_injection($s){
    return preg_match('/[\r\n](to:|from:|bcc:|cc:|subject:)/i', $s);
}

// ==== HONEYPOT ====
if (!empty($_POST['website'])) {
    json_out(true); // on fait "comme si" pour les bots
}

// ==== INPUTS ====
$name    = sanitize($_POST['name']    ?? '');
$email   = sanitize($_POST['email']   ?? '');
$message = sanitize($_POST['message'] ?? '');

// ==== VALIDATION SIMPLE ====
if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    json_out(false, ['error' => 'Champs invalides']);
}
if (looks_like_header_injection($name) || looks_like_header_injection($email)) {
    json_out(false, ['error' => 'Entrée invalide']);
}

$subject = 'Contact portfolio — ' . $name;

// ==== ENVOI ====
if (USE_PHPMAILER) {
    require __DIR__ . '/vendor/autoload.php';
    try {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        // $mail->SMTPDebug = 2; // décommenter en dev pour voir les logs SMTP
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port       = SMTP_PORT;
        $mail->CharSet    = 'UTF-8';

        // From / To
        $mail->setFrom('noreply@portfolio.test', 'Portfolio Reda');
        $mail->addAddress(TO_EMAIL, TO_NAME);
        $mail->addReplyTo($email, $name);

        // Contenu
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body    = "<p><b>De :</b> ".htmlspecialchars($name)." &lt;".htmlspecialchars($email)."&gt;</p>"
            . "<p style='white-space:pre-wrap'>".nl2br(htmlspecialchars($message))."</p>";
        $mail->AltBody = "De: $name <$email>\n\n$message";

        // Envoi
        $mail->send();
        json_out(true);

    } catch (Throwable $e) {
        json_out(false, ['error' => 'Mailer error: '.$e->getMessage()]);
    }
}

// ==== Option mail() (secours, rarement utilisée en local) ====
$to = TO_EMAIL;
$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: Portfolio Reda <noreply@portfolio.test>',
    'Reply-To: '.sprintf('"%s" <%s>', addslashes($name), $email),
];
$headers_str = implode("\r\n", $headers);
$body = "<p><b>De :</b> ".htmlspecialchars($name)." &lt;".htmlspecialchars($email)."&gt;</p>"
    . "<p style='white-space:pre-wrap'>".nl2br(htmlspecialchars($message))."</p>";

if (@mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $body, $headers_str)) {
    json_out(true);
} else {
    json_out(false, ['error' => 'mail() indisponible — activez PHPMailer/SMTP']);
}