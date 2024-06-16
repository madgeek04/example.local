<?php
// Файлы phpmailer
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

# проверка, что ошибки нет
if (!error_get_last()) {

    // Переменные, которые отправляет пользователь
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $subject = "Новое сообщение с сайта";
    $body = "Имя: " . $name . "<br/>" . 
        "Email: " . $email . "<br/>" . 
        "Сообщение: " . $message;

    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function ($str, $level) {
        $GLOBALS['data']['debug'][] = $str;
    };

    // Настройки вашей почты
    $mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'moiseev.artyom2017'; // Логин на почте
    $mail->Password   = 'uevnaufomsagiaxn'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('moiseev.artyom2017@yandex.ru', $name); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('moiseev.artyom2017@yandex.ru');

    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = $body;
    // Проверяем отправленность сообщения
    if ($mail->send()) {
        $data['result'] = "success";
        $data['info'] = "Сообщение успешно отправлено!";
    } else {
        $data['result'] = "error";
        $data['info'] = "Сообщение не было отправлено. Ошибка при отправке письма";
        $data['desc'] = "Причина ошибки: {$mail->ErrorInfo}";
    }
} else {
    $data['result'] = "error";
    $data['info'] = "В коде присутствует ошибка";
    $data['desc'] = error_get_last();
}

// Отправка результата
header('Content-Type: application/json');
echo json_encode($data);
