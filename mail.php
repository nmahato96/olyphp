
<?php
$to      = 'niladrimahato96@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: nmahato@aapnainfotech.in' . "\r\n" .
    'Reply-To: nmahato@aapnainfotech.in' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
