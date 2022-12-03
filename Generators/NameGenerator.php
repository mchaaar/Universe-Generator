<?php

$usedPlanetNames = [];
$usedSystemNames = [];

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
            //CheckSameName($type, $chosenName) ? GenerateNewName($type) : array_push($usedPlanetNames, $chosenName);
            return $chosenName;
        case 'system':
            $systemNamesFile = "Lists/SystemNames.txt";
            $systemNames = file($systemNamesFile);
            return $systemNames[rand(0, count($systemNames) - 1)];
    }
}
