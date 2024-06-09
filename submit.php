<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email1'];
  $message = $_POST['subject'];

  $to = 'm.a.d_geek@mail.ru';
  $subject = 'Новое сообщение с сайта';
  $headers = 'From: '.$name.' <'.$email.'>' . "\r\n" .
             'Reply-To: '.$email. "\r\n" .
             'X-Mailer: PHP/' . phpversion();


  $body = 'Имя: '.$name."\r\n".
          'Email: '.$email."\r\n".
          'Сообщение: '.$message;

  if (mail($to, $subject, $body, $headers)) {
    http_response_code(200);
  } else {
    http_response_code(500);
  }
} else {
  http_response_code(400);
}



