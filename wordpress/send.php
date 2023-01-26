<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['your-name'];
$email = $_POST['email'];
$company = $_POST['company'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Формирование самого письма
$title = "Ordering a free demo version";
$body = "
<h2>Ordering a free demo version</h2>
<b>Full name:</b> $name<br>
<b>Email:</b> $email<br><br>
<b>Company:</b> $company<br><br>
<b>Phone:</b> $phone<br><br>
<b>Message:</b><br>$message

";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    $mail->Host       = 'smtp.eu.mailgun.org'; 
    $mail->Username   = 'postmaster@web-divingstudio.by'; 
    $mail->Password   = '117b5818804d367de8f233ebb3313491-2bab6b06-1d055afc';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('postmaster@web-divingstudio.by', 'Web-diving studio'); 
    // Получатель письма
    $mail->addAddress('web-divingstudio@yandex.by');  

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