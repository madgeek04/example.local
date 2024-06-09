<?php
session_start();
include 'config.php';

// Проверка аутентификации
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Проверка прав доступа
if ($_SESSION['is_admin'] != 1) {
    echo "У вас нет прав для доступа к этой странице.";
    exit();
}

include 'config.php';

// Подключение к базе данных
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$id = $_GET['id'];

// Получение информации о записи для редактирования
$sql = "SELECT * FROM records WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Редактировать запись</title>
</head>
<body>

<h2>Редактировать запись</h2>
<form method="post" action="index.php">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Заголовок: <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
    Описание: <textarea name="description"><?php echo $row['description']; ?></textarea><br>
    Слаг: <input type="text" name="slug" value="<?php echo $row['slug']; ?>"><br> <!-- Добавлено поле для слага -->
    <input type="submit" name="submit" value="Сохранить изменения">
</form>

</body>
</html>

<?php $conn->close(); ?>
