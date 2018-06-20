<?php
namespace file;

class TextFile
{
    private $name;
    private $format = 'txt';

    public function __construct($name)
    {
        $this -> name = $name;
    }

    public function setFormat($format)
    {
        $this -> format = $format;
    }

    public function showFile()
    {
        return 'Ваш файл: ' . $this -> name . '.' . $this -> format;
    }
}