<?php

    $myName = 'Владимир';
    $myAge = 29;
    $myEmail = 'vl.scherbitskiy@gmail.com';
    $myCity = 'Обнинск';
    $myInfo = 'Начинающий веб-разработчик';

?>

<h1>Персональная страница Щербицкого</h1>

<table>
    <tbody>
        <tr>
            <td width=200>Имя</td>
            <td><?= $myName ?></td>
        </tr>
        <tr>
            <td>Возраст</td>
            <td><?= $myAge ?></td>
        </tr>
        <tr>
            <td>Адрес электронной почты</td>
            <td>
                <a href="#"><?= $myEmail ?></a>
            </td>
        </tr>
        <tr>
            <td>Город</td>
            <td><?= $myCity ?></td>
        </tr>
        <tr>
            <td>О себе</td>
            <td><?= $myInfo ?></td>
        </tr>
    </tbody>
</table>