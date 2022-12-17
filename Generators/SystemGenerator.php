<?php

use function PHPSTORM_META\type;

include_once('Generators/NameGenerator.php');
require('Generators/ArtificialBodyGenerator.php');
require('Generators/AsteroidGenerator.php');
require('Generators/StarGenerator.php');
require('Generators/PlanetGenerator.php');
require('Generators/RomanGenerator.php');
require('Generators/GateGenerator.php');
require('Objects/System.php');

$entries = '';

function GenerateNewSystem($maxPlanetsPerSystem, $fileIndex, $outputType, $minInhabitants, $maxInhabitants){

    global $entries;

    $system = new System(GenerateNewName('system'));
    $planetOccurences = array();
    $firstIteration = rand(1, $maxPlanetsPerSystem);
    
    array_push($system->gates, GenerateNewGate($system->name));
    
    if ($outputType == 1){
        $fileName = $fileIndex . '-' . trim($system->name);
        fopen('Output/' . $fileName . '.txt', 'w');
    }
    
    $entries = 'System Name: ' . $system->name . "\n" . 'Amount of Planets: ' . $maxPlanetsPerSystem+1 - $firstIteration . "\n\n";

    for ($i = $firstIteration; $i <= $maxPlanetsPerSystem; $i++){

        $planet = GenerateNewPlanet($minInhabitants, $maxInhabitants);
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

        FinalChecks($system, $planet, $fileName, $occured, $valid, $i);

    }

    file_put_contents('Output/' . $fileName . '.txt', $entries);

    AsteroidGeneration($system);
    StarGeneration($system);
    ArtificialBodyGeneration($system);
    
    return $system;
}

function FinalChecks(System $system, Planet $planet, string $fileName, bool $occured, bool $valid, int $i){

    if ($occured == false){
        $planetOccurences[$planet->name] = 1;
        $valid = true;
    }

    if ($valid){
        array_push($system->planets, $planet);
        OutputPlanet($planet, 'Output/' . $fileName . '.txt', $system);
    } 
    
    else {
        $i -= 1;
    }
}

function AsteroidGeneration(System $system){

    for ($i = 0; $i < 10; $i++){
        $asteroid = GenerateNewAsteroid($system->name, $i);
        array_push($system->asteroids, $asteroid);
    }
}

function ArtificialBodyGeneration($system){

    for ($i = 0; $i < 10; $i++){
        $artificialBody = GenerateNewArtificialBody();
        array_push($system->artificialBodies, $artificialBody);
    }
}

function StarGeneration($system){

    for ($i = 0; $i < 10; $i++){
        $star = GenerateNewStar($system->name);
        array_push($system->stars, $star);
    }
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
    }
    
    $entries .= "\n";
}
