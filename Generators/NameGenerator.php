<?php

function GenerateNewName(string $type){

    global $usedNames;

    switch ($type){
        case 'human':
            $firstNamesFile = "Lists/FirstNames.txt";
            $firstNames = file($firstNamesFile);
            $lastNamesFile = "Lists/LastNames.txt";
            $lastNames = file($lastNamesFile);
            return $firstNames[rand(0, count($firstNames) - 1)] . ' ' . $lastNames[rand(0, count($lastNames) - 1)];
        case 'planet':
            $planetNamesFile = "Lists/PlanetNames.txt";
            $planetNames = file($planetNamesFile);
            $chosenName = $planetNames[rand(0, count($planetNames) - 1)];
            return $chosenName;
        case 'system':
            $systemNamesFile = "Lists/SystemNames.txt";
            $systemNames = file($systemNamesFile);
            return $systemNames[rand(0, count($systemNames) - 1)];
        case 'artificialBody':
            $artificialBodyNamesFile = "Lists/ArtificialBodyNames.txt";
            $artificialBodyNames = file($artificialBodyNamesFile);
            return $artificialBodyNames[rand(0, count($artificialBodyNames) -1)];
    }
}
