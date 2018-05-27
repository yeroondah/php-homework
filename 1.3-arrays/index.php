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
$namesFromTwoWords = [];
$firstNames = [];
$secondNames = [];
$fantasyAnimals = [];
$finalAnimalsList = [];
$index = 0;

foreach ($animals as $continent => $animalsList) {
    foreach ($animalsList as $animal) {
        if (str_word_count($animal) == 2) {
            $namesFromTwoWords[$continent][] = explode(' ', $animal);
            $firstNames[] = $namesFromTwoWords[$continent][$index][0];
            $secondNames[] = $namesFromTwoWords[$continent][$index][1];
            $index++;
       }   
    }
    $index = 0;
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