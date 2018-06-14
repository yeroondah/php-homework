<?php
$file_list = glob('uploads/*.json');
$test = [];
foreach ($file_list as $key => $file) {
    if ($key == $_GET['test']) {
        $test = json_decode(file_get_contents($file_list[$key]), true);
    }
}
$question = $test[0]['question'];
$anwsers = $test[0]['anwsers'];

if (!empty($_POST)) {
    foreach ($anwsers as $value) {
        if ($value['anwser'] === $_POST['anwser'] && $value['result'] === true) {
            $message = 'Это правильный ответ. Пройди другой тест';
            break;
        } else {
            $message = 'Это неправильный ответ. Попробуй ещё';
        }
    }    
} else {
    $message = 'Выбери правильный ответ';
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тест: <?= $question ?></title>
</head>
<body>

<h2><?= $message; ?></h2>

<form method="post">
    <fieldset>
        <legend><?= $question ?></legend>
        <?php foreach ($anwsers as $item) : ?>
            <label>
                <input type="radio" name="anwser" value="<?= $item['anwser']; ?>"> 
                    <?= $item['anwser']; ?>
            </label>
        <?php endforeach; ?>
    </fieldset>
    <input type="submit" value="Отправить">
</form>

<ul>
    <li><a href="admin.php">Загрузить тест</a></li>
    <li><a href="list.php">Список тестов</a></li>
</ul>

</body>
</html>


