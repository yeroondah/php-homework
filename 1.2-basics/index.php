<?php
    $numUser = rand(0, 100);
    echo $numUser.'<br>';
    $numOne = 1;
    $numTwo = 1;

    do {
        switch ($numOne > $numUser) {
            case true:
                echo "задуманное число НЕ входит в числовой ряд";
                break 2;
            case false:
                switch ($numOne == $numUser) {
                    case true:
                        echo "задуманное число входит в числовой ряд";
                        break 3;
                    case false:
                        $numThree = $numOne;
                        $numOne = $numOne + $numTwo;
                        $numTwo = $numThree;          
                }
        }   
    } while ($numOne > $numTwo);

?>