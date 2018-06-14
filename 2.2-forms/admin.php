<?php
if (isset($_POST) && isset($_FILES['testfile'])) {
    $file_name = $_FILES['testfile']['name'];
    $tmp_file = $_FILES['testfile']['tmp_name'];
    $uploads_dir = 'uploads/';
    $path_info = pathinfo($uploads_dir . $file_name);
    if ($path_info['extension'] === 'json') {
        move_uploaded_file($tmp_file, $uploads_dir . $file_name);
        echo 'Тест успешно загружен';
    } else {
        echo 'Неверный формат';
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузить тест</title>
</head>
<body>

    <form method="post" enctype=multipart/form-data>
        <input type=file name=testfile>
        <button type="submit">Загрузить</button>
    </form>

    <ul>
        <li><a href="list.php">Список тестов</a></li>
    </ul>
</body>
</html>
