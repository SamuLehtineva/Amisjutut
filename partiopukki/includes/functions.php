<?php
function SendEmail($email, $title, $text) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers = "From: pukkimoottori@partiopukki.truudeli17.net"."\r\n".'Content-type: text/plain; charset=utf-8'."\r\n".'X-Mailer: PHP/' . phpversion(); 
    $result = mail($email, $title, $text, $headers);
    return $result;
}
?>