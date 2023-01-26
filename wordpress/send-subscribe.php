<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$email = $_POST['email-subscribe'];


// Формирование самого письма
$title = "Weekly updates";
$body = "
<h2>Weekly updates</h2>
<b>Email:</b> $email<br><br>


";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.eu.mailgun.org'; 
    $mail->Username   = 'postmaster@mailform.simplaq.com'; 
    $mail->Password   = '117b5818804d367de8f233ebb3313491-2bab6b06-1d055afc';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('web@mailform.simplaq.com', 'Simplaq'); 

    // Получатель письма
    // $mail->addAddress('hello@simplaq.com');  
    $mail->addAddress('chopikvitali@yandex.by'); 
// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "The message was not sent. The reason for the error: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);