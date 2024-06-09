<?php
session_start();
include 'config.php';

// Проверка, была ли отправлена форма входа
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Запрос на поиск пользователя в базе данных
    $sql = "SELECT * FROM users WHERE username='$username'";
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (!password_verify($password, $row['password'])) {
            // Пароль верен, установка сессионной переменной для аутентификации
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = $row['is_admin'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Неправильное имя пользователя или пароль.";
        }
    } else {
        $error = "Неправильное имя пользователя или пароль.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Вход</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    <style>
        html {
            height: 100%;
            width: 100%;
        }

        body {
            min-height: 100%;
            min-width: 100%;
        }

    </style>

    <form method="post" action="" class="position-absolute top-50 start-50 translate-middle">
        <div style="display: flex; justify-content: center; align-items: center; flex-direction: column">
            <h2>Вход</h2>
            <div class="">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                    <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="basic-addon1">
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Войти">
        </div>
    </form>

    <?php if (isset($error)) echo "<p>$error</p>"; ?>

</body>

</html>