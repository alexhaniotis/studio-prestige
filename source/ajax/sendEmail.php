<?php

header('Content-Type: application/json'); //Necessary for jQuery to understand we're sending JSON

function file_get_contents_utf8($fn) {
  $content = file_get_contents($fn);
  return mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}

//Send email
require_once "lib/PHPMailer/class.phpmailer.php";

$mail = new PHPMailer(true); // We pass true to throw exceptions

$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = 'smtp.mandrillapp.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'frank@volume7.io';
$mail->Password = $_ENV["MANDRILL_PASSWORD"];
$mail->SMTPSecure = 'tls';

$mail->AddReplyTo($_POST["email"], $_POST["name"]);
$mail->From = "studio-prestige@volume7.ca";
$mail->FromName = $_POST["name"];
$mail->AddAddress('le-facteur@volume7.ca');

$mail->Subject = $filename;

$template = $_POST["template"];

$mailBody = file_get_contents_utf8($filename . ".txt");

if ($template == "registration") {
  $mailBody = str_replace('{{name}}', $_POST['name'], $mailBody);
  $mailBody = str_replace('{{email}}', $_POST['email'], $mailBody);
}
else if ($template == "general") {
  $mailBody = str_replace('{{name}}', $_POST['name'], $mailBody);
  $mailBody = str_replace('{{email}}', $_POST['email'], $mailBody);
  $mailBody = str_replace('{{message}}', $_POST['message'], $mailBody);
}
else {
  header('Unauthorized');
}

$mail->Body = $mailBody;

if (isset($_FILES['file']) &&
    $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['file']['tmp_name'],
                         $_FILES['file']['name']);
}

if(!$mail->Send()) {
  $response = array(
    'success' => false,
    'error' => "Il y a eu une erreur. Veuillez réessayer plus tard."
  );

  echo json_encode($response);
  exit;
}

$response = array(
  'success' => true
);

echo json_encode($response);