<?php

function showInfo($array)
{
    foreach ($array as $key => $value)
    {
        echo "$key: $value" . '<br>';
    }
}