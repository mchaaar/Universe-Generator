<?php

function GenerateNewName(string $type){

    switch ($type){
        case 'human':
            $firstNamesFile = "Lists/FirstNames.txt";
            $firstNames = file($firstNamesFile);
            $lastNamesFile = "Lists/LastNames.txt";
            $lastNames = file($lastNamesFile);
            return $firstNames[rand(0, 2093)] . ' ' . $lastNames[rand(0, 8248)];
        case 'planet':
            $planetNamesFile = "Lists/PlanetNames.txt";
            $planetNames = file($planetNamesFile);
            return $planetNames[rand(0, 593)];
        case 'system':
            $systemNamesFile = "Lists/SystemNames.txt";
            $systemNames = file($systemNamesFile);
            return $systemNames[rand(0, 16)];
    }
}
