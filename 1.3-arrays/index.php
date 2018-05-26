<?php
    $animals = [
        'Africa' => [
            'Gekkonidae',
            'Dendroaspis polylepis',
            'Sagittarius serpentarius',
            'Hyaenidae',
            'Leptailurus serval'
        ],
        'Asia' => [
            'Axis',
            'Symphalangus syndactylus',
            'Tarsius',
            'Bos frontalis',
            'Gavialis gangeticus'
        ],
        'Antarctica' => [
            'Physeter macrocephalus',
            'Lobodon carcinophagus',
            'Rossella',
            'Chionis alba',
            'Pygoscelis papua'
        ]
    ];

    foreach ($animals as $continent => $animalsList) {
        foreach ($animalsList as $animal) {
            if (strpos($animal, ' ')) {
                $namesFromTwoWords[$continent][] = explode(' ', $animal);
            }   
        }
    }

    foreach ($namesFromTwoWords as $singleAnimal) {
        foreach ($singleAnimal as $names) {
            $firstNames[] = $names[0];
            $secondNames[] = $names[1];
        }
    }

    shuffle($firstNames);
    shuffle($secondNames);

    for ($index = 0; $index < count($firstNames); $index++) {
        $fantasyAnimals[$index][0] = $firstNames[$index];
        $fantasyAnimals[$index][1] = $secondNames[$index];
    }

    echo "<h2>Fantasy Animals</h2>";
    for ($index = 0; $index < count($fantasyAnimals); $index++) {
        echo "{$fantasyAnimals[$index][0]} {$fantasyAnimals[$index][1]}<br>";
    }
    
    for ($i = 0; $i < count($fantasyAnimals); $i++) {
        foreach ($namesFromTwoWords as $continent => $animal) {
            for ($j = 0; $j < count($animal); $j++) {
                if (in_array($fantasyAnimals[$i][0], $animal[$j])) {
                    $finalAnimalsList[$continent][] = "{$fantasyAnimals[$i][0]} {$fantasyAnimals[$i][1]}";
                }
            }
        }
    } 

    foreach ($finalAnimalsList as $country => $animal) {
        echo "<h2>$country</h2>";
        echo implode(', ', $finalAnimalsList[$country]);
    }  
?>