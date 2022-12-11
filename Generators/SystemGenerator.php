<?php

use function PHPSTORM_META\type;

include_once('Generators/NameGenerator.php');
require('Generators/ArtificialBodyGenerator.php');
require('Generators/AsteroidGenerator.php');
require('Generators/PlanetGenerator.php');
require('Generators/RomanGenerator.php');
require('Objects/System.php');

$entries = '';

function GenerateNewSystem($maxPlanetsPerSystem, $fileIndex, string $outputType){

    global $entries;

    $system = new System(GenerateNewName('system'));
    $planetOccurences = array();
    $firstIteration = rand(1, $maxPlanetsPerSystem);
    
    if ($outputType == 'txt'){
        $fileName = $fileIndex . '-' . trim($system->name);
        fopen('Output/' . $fileName . '.txt', 'w');
    }
    
    $entries = 'System Name: ' . $system->name . "\n" . 'Amount of Planets: ' . $maxPlanetsPerSystem+1 - $firstIteration . "\n\n";

    for ($i = $firstIteration; $i <= $maxPlanetsPerSystem; $i++){

        $planet = GenerateNewPlanet();
        $occured = false;
        $valid = false;

        foreach ($planetOccurences as $key => $val){

            if ($key == $planet->name){
                $occured = true;

                if ($val < 5){
                    $t = $val + 1;
                    $planetOccurences[$key] = $t;
                    $planet->name = $planet->name . " " . GenerateNewRoman($t);
                    $valid = true;
                }
            }
        }

        if ($i == $firstIteration){
            $planetOccurences[$planet->name] = 1;
            $valid = true;
            $occured = true;
        }

        if ($occured == false){
            $planetOccurences[$planet->name] = 1;
            $valid = true;
        }

        if ($valid){
            array_push($system->planets, $planet);
            OutputPlanet($planet, 'Output/' . $fileName . '.txt', $system);
        }

        else{
            $i -= 1;
        }
    }
    file_put_contents('Output/' . $fileName . '.txt', $entries);

    for ($i = 0; $i < 10; $i++){
        $asteroid = GenerateNewAsteroid();
        array_push($system->asteroids, $asteroid);
    }

    for ($i = 0; $i < 10; $i++){
        $artificialBody = GenerateNewArtificialBody();
        array_push($system->artificialBodies, $artificialBody);
    }

    return $system;
}

function OutputPlanet(Planet $planet, $filePath, $system){
    global $entries;
    $entries .= $planet->name . "\n";
    $entries .= '   -Size: ';
    $entries .= $planet->size . "\n";
    $entries .= '   -Inhabited: ';
    $entries .= $planet->inhabited ? 'yes' . "\n" : 'no' . "\n";

    if ($planet->inhabited){
        $entries .= '   -Inhabitants Amount: ';
        $entries .= $planet->inhabitantsAmount . "\n";
        $entries .= '   -Diplomatic Scale: ';
        $entries .= $planet->diplomaticScale . "\n";
    }
    
    $entries .= "\n";
}