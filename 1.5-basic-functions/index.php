<?php

function getContent()
{
    $data_json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Obninsk&appid=059d32e4933efe1aad5128e726d200c3");
    file_put_contents('data.json', $data_json);
    return json_decode($data_json, true);
}

function cloudCount($cloud)
{   
    $link = "http://apidev.accuweather.com/developers/Media/Default/WeatherIcons/";

    if($cloud <= 5) {
        return "$link" . "01-s.png";
    }
    elseif($cloud > 5 && $cloud <= 50) {
        return "$link" . "03-s.png";
    }
    else {
        return "$link" . "06-s.png";
    }
}

if (file_exists('data.json') && time() - filemtime('data.json') < 3600) {
    $data_array = json_decode(file_get_contents('data.json'), true);
} else {
    $data_array = getContent();
}

$cloud = cloudCount($data_array['clouds']['all']);
$humidity = $data_array['main']['humidity'] . '%';
$celcium = round($data_array['main']['temp'] - 273.15) . ' &degC';
?>

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
        <img src="<?= $cloud ?>">
    </td>
</tr>
</table>