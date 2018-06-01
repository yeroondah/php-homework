<?php

    $phoneBook = json_decode(file_get_contents(__DIR__ . '/phones.json'), true);

?>

<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title>homework</title>
</head>

<body>
    <table class="table">
        <tr>
            <td class="main-width">
                Имя
            </td>
            <td class="main-width">
                Фамилия
            </td>
            <td class="main-width">
                Страна
            </td>
            <td class="main-width">
                Область
            </td>
            <td class="main-width">
                Город
            </td>
            <td class="main-width">
                Адресс
            </td>
            <td class="main-width">
                Домашний телефон
            </td>
            <td class="main-width">
                Мобильный телефон
            </td>
        </tr>

    <?php foreach ($phoneBook as $item) : ?>
        <tr>
            <td>
                <?php echo $item['first_name'];?>
            </td>
            <td>
                <?php echo $item['last_name'];?>
            </td>
            <td>
                <?php echo $item['adress']['country'];?>
            </td>
            <td>
                <?php echo $item['adress']['region'] . '.обл';?>
            </td>
            <td>
                <?php echo $item['adress']['city'];?>
            </td>
            <td>
                <?php echo 'ул.' . $item['adress']['street_name'];?>
            </td>
            <td>
                <?php echo $item['phone_numbers']['home_number'];?>
            </td>
            <td>
                <?php echo $item['phone_numbers']['mobile_phone'];?>
            </td>
        </tr>
    <?php endforeach;?>
    </table>
</body>
</html>