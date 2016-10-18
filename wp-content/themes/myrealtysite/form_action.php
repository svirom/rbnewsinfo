<?php header("Content-Type: text/html; charset=utf-8");?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = "From: <callback@{$_SERVER['HTTP_HOST']}>\r\nMIME-Version: 1.0\r\nContent-Type: text/plain; charset=\"utf-8\"";
    $to = 'olga@rbnews.info'; 
    $subject = 'From RealtyBusinessNews';
    $body = "From: $name\n Company: $email\n Subject: $subject\n E-Mail: $email\n Message:\n $message";
?>

<?php
if ($_POST['submit']) {
    if (mail($to, $subject, $body, $headers)) 
        echo '<p>Ваше письмо отправлено!</p>';
     else  
        echo '<p>Что-то пошло не так, вернитесь и попробуйте снова!</p>'; 
    
}
?>
<p><a href="http://rbnews.info/contacts">Вернуться на страницу контактов</a></p>
