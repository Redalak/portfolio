<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json; charset=utf-8');

const USE_PHPMAILER = true;

const SMTP_HOST   = 'sandbox.smtp.mailtrap.io';
const SMTP_PORT   = 2525;
const SMTP_SECURE = 'tls';
const SMTP_USER   = '545db02ab8978c';
const SMTP_PASS   = '4bf76932ea8c1b';
const TO_EMAIL    = 'lreda2801@mail.com';
const TO_NAME     = 'Reda Lakhledj';

function json_out($ok, $payload = []) {
    http_response_code($ok ? 200 : 400);
    echo json_encode(['ok' => $ok] + $payload, JSON_UNESCAPED_UNICODE);
    exit;
}

function sanitize($s){ return trim((string)$s); }
function looks_like_header_injection($s){
    return preg_match('/[\r\n](to:|from:|bcc:|cc:|subject:)/i', $s);
}

if (!empty($_POST['website'])) json_out(true);

$name    = sanitize($_POST['name']    ?? '');
$email   = sanitize($_POST['email']   ?? '');
$message = sanitize($_POST['message'] ?? '');

if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) json_out(false, ['error' => 'Champs invalides']);
if (looks_like_header_injection($name) || looks_like_header_injection($email)) json_out(false, ['error' => 'Entrée invalide']);

$subject = 'Contact portfolio — ' . $name;

if (USE_PHPMAILER) {
    require __DIR__ . '/vendor/autoload.php';
    try {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port       = SMTP_PORT;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom('noreply@portfolio.test', 'Portfolio Reda');
        $mail->addAddress(TO_EMAIL, TO_NAME);
        $mail->addReplyTo($email, $name);

        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body    = "<p><b>De :</b> ".htmlspecialchars($name)." &lt;".htmlspecialchars($email)."&gt;</p>"
            . "<p style='white-space:pre-wrap'>".nl2br(htmlspecialchars($message))."</p>";
        $mail->AltBody = "De: $name <$email>\n\n$message";

        $mail->send();
        json_out(true);
    } catch (Throwable $e) {
        json_out(false, ['error' => 'Mailer error: '.$e->getMessage()]);
    }
}

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

if (@mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $body, $headers_str)) json_out(true);
else json_out(false, ['error' => 'mail() indisponible — activez PHPMailer/SMTP']);