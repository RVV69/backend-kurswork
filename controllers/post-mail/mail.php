<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/wamp64/www/CW-BackEnd/controllers/post-mail/PHPMailer/src/Exception.php';
require '/wamp64/www/CW-BackEnd/controllers/post-mail/PHPMailer/src/PHPMailer.php';
require '/wamp64/www/CW-BackEnd/controllers/post-mail/PHPMailer/src/SMTP.php';

$to = 'ipzk231_rvv@student.ztu.edu.ua';
$subject = 'Application from the PetGuardians website (messages from users)';

function clear_data($val){
    $val = trim($val);
    $val = stripslashes($val);
    $val = htmlspecialchars($val);
    return $val;
}

$fullname = clear_data($_POST['fullname']);
$phone = clear_data($_POST['phone']);
$email = clear_data($_POST['email']);
$comment = clear_data($_POST['comment']);

$message = 'Ім\'я: ' . $fullname . "\nТелефон: " . $phone . "\nE-mail: " . $email . "\nComment: " . $comment;

$mail = new PHPMailer(true);

try {

    $mail->SMTPDebug = 0;
    $mail->isSMTP(); 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true; 
    $mail->Username = 'elirei007591@gmail.com'; 
    $mail->Password = 'bojm hbjk sqnz wtex'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 

    $mail->setFrom('elirei007591@gmail.com', 'Volonteer');
    $mail->addAddress($to);

    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
    header("Location: /view/Main");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>