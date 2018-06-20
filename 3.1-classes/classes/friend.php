<?php
namespace friend;

class Friend 
{
    private $name;

    public function __construct($name)
    {
        $this -> name = $name;
    }
    
    public function tellAboutFriend()
    {  
        return 'У меня есть друг. Его зовут ' . $this -> name . '.';
    }
}