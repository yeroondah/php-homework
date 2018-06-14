<?php
$file_list = glob('uploads/*.json');
$test = [];
foreach ($file_list as $key => $file) {
    if ($key == $_GET['test']) {
        $test = json_decode(file_get_contents($file_list[$key]), true);
    }
}

if (empty($test)) {
    header("HTTP/1.1 404 Not Found");
    exit;
}

$question = $test[0]['question'];
$anwsers = $test[0]['anwsers'];

if (!empty($_POST['anwser'])) {
    foreach ($anwsers as $value) {
        if ($value['anwser'] === $_POST['anwser'] && $value['result'] === true) {
            $message = 'Это правильный ответ. Пройди другой тест';
            $testPassed = true;
            break;
        } else {
            $message = 'Это неправильный ответ. Попробуй ещё';
        }
    }    
} else {
    $message = 'Выбери правильный ответ';
}


if (!empty($_POST['name'])) {
    $name = $_POST['name'];
    $im = imagecreatetruecolor(640, 464);

    $backColor = imagecolorallocate($im, 255, 224, 221);
    $textColor = imagecolorallocate($im, 0, 0, 0);

    $fontFile = 'font.ttf';

    $imBox = imagecreatefromjpeg('cert.jpg');


    imagefill($im, 0, 0, $backColor);
    imagecopy($im, $imBox, 0, 0, 0, 0, 640, 464);
    imagettftext($im, 20, 0, 170, 185, $textColor, $fontFile, $name);
    imagettftext($im, 15, 0, 85, 385, $textColor, $fontFile, 'Оценка: отлично');
    imagettftext($im, 15, 0, 485, 385, $textColor, $fontFile, date("d.m.y"));

    imagejpeg($im, 'certificate.jpg');
    imagedestroy($im);
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест: <?= $question ?></title>
</head>
<body>

<h2><?= $message; ?></h2>

<?php if (!$testPassed): ?>
<form method="post">
    <fieldset>
        <legend><?= $question; ?></legend>
        <?php foreach ($anwsers as $item) : ?>
            <label>
                <input type="radio" name="anwser" value="<?= $item['anwser']; ?>">
                    <?= $item['anwser']; ?>
            </label>
        <?php endforeach; ?>
    </fieldset>
    <input type="submit" value="Отправить">
</form>
<?php endif; ?>

<?php if ($testPassed) : ?>
    <p>Или заполните имя и получите сертификат</p>
    <form method="post">
        <input type="text" name="name" placeholder="Ваше имя">
        <button>Получить</button>
    </form>
<?php endif; ?>

<?php if (!empty($_POST['name'])): ?>
    <img src="certificate.jpg" alt="Ваш сертификат">
<?php endif;?>



<ul>
    <li><a href="admin.php">Загрузить тест</a></li>
    <li><a href="list.php">Список тестов</a></li>
</ul>
</body>
</html>


