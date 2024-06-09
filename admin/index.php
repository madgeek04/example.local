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

// Подключение к базе данных
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Обработка создания/редактирования записи
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $slug = $_POST['slug']; // Добавляем слаг

    if ($_POST['action'] == 'create') {
        $sql = "INSERT INTO records (title, description, slug) VALUES ('$title', '$description', '$slug')";
    } elseif ($_POST['action'] == 'edit') {
        $id = $_POST['id'];
        $sql = "UPDATE records SET title='$title', description='$description', slug='$slug' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Обработка удаления записи
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $sql = "DELETE FROM records WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Получение существующих записей
$sql = "SELECT * FROM records";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Админка</title>
</head>

<body>

    <h2>Создать запись</h2>
    <form method="post" action="index.php">
        <input type="hidden" name="action" value="create">
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">Заголовок</span>
                <input type="text" name="title" class="form-control" aria-describedby="basic-addon3 basic-addon4">
            </div>
        </div>
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">Описание</span>
                <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
            </div>
        </div>
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">Slug</span>
                <input type="text" name="slug" class="form-control" aria-describedby="basic-addon3 basic-addon4">
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Создать запись">
    </form>

    <<h2>Существующие записи</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Загловок</th>
                    <th scope="col">Описание</th>
                    <th scope="col">slug</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['slug']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Редактировать</a>
                            <a href="index.php?action=delete&id=<?php echo $row['id']; ?>">Удалить</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</body>

</html>

<?php $conn->close(); ?>