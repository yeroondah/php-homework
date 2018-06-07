<?php
$link = 'http://api.openweathermap.org/data/2.5/weather';
$city = 'Omsk,ru';
$appid = '059d32e4933efe1aad5128e726d200c3';
$url = "$link?q=$city&appid=$appid";
$dataArray;

function getContent($url)
{   
    $dataJson = file_get_contents($url);
    if ($dataJson === false) {
        exit('Не удалось получить данные');
    }
    file_put_contents('data.json', $dataJson);

    if (json_decode($dataJson, true) === NULL) {
        exit('Ошибка декодирования JSON');
    }
    return json_decode($dataJson, true);;
}

function createCloudIconUrl($name)
{   
    return "http://openweathermap.org/img/w/$name.png";
}

if (file_exists('data.json') && time() - filemtime('data.json') < 3600) {
    $dataArray = json_decode(file_get_contents('data.json'), true);
    if ($dataArray === NULL) {
        exit('Ошибка декодирования JSON');
    }
} else {
    $dataArray = getContent($url);
}

$cloudValue = $dataArray['weather'][0]['icon'];
$cloudIcon = empty($cloudValue) ? '' : createCloudIconUrl($cloudValue);
$humidityValue = $dataArray['main']['humidity'];
$humidity = empty($humidityValue) ? 'Нет данных' : $humidityValue  . '%';
$tempValue = $dataArray['main']['temp'];
$celcium = empty($tempValue) ? 'Нет данных' : round($tempValue - 273.15) . ' &degC';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Погода</title>
</head>
<body>
    <table>
    <tr height="50">
        <td>
            Температура:
        </td>
        <td  width="50" style="text-align: center">
            <?= $celcium ?>
        </td>
    </tr>
    <tr height="50">
        <td>
            Влажность воздуха:
        </td>
        <td style="text-align: center">
            <?= $humidity ?>
        </td>
    </tr>
    <tr height="50">
        <td>
            Облачность:
        </td>
        <td>
            <img src="<?= $cloudIcon ?>" alt="">
        </td>
    </tr>
    </table>
</body>
</html>
