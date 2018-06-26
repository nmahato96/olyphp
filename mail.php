<?php
$to = "niladrimahato96@gmail.com";
$subject = "mail function";
$txt = "testing mail function in server";
$headers = "From: nmahato@aapnainfotech.in" . "\r\n" .
"CC: akashkgp96@gmail.com";

mail($to,$subject,$txt,$headers);
?>