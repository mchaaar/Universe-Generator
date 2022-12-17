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

function GenerateNewSystem($settings, $fileIndex){

    global $entries;

    $system = new System(GenerateNewName('system'));
    $planetOccurences = array();

    $planetAmount = rand($settings[1], $settings[2]);
    
    array_push($system->gates, GenerateNewGate($system->name));
    
    if ($settings[6] == 1){
        $fileName = $fileIndex . '-' . trim($system->name);
        fopen('Output/' . $fileName . '.txt', 'w');
    }
    
    $entries = 'System Name: ' . $system->name . "\n" . 'Amount of Planets: ' . $planetAmount . "\n\n";

    for ($i = 1; $i <= $planetAmount; $i++){

        $planet = GenerateNewPlanet($settings[3], $settings[4], $settings[12], $settings[13], $settings[14], $settings[15], $settings[9]);
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

        if ($i == 1){
            $planetOccurences[$planet->name] = 1;
            $valid = true;
            $occured = true;
        }

        FinalChecks($system, $planet, $fileName, $occured, $valid, $i);
    }

    file_put_contents('Output/' . $fileName . '.txt', $entries);

    AsteroidGeneration($system, $settings[7]);
    StarGeneration($system, $settings[10], $settings[11]);
    ArtificialBodyGeneration($system, $settings[8]);
    
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

function AsteroidGeneration(System $system, $maxAsteroidAmount){

    $firstRound = rand(1, $maxAsteroidAmount);

    for ($i = 1; $i <= $firstRound; $i++){
        $asteroid = GenerateNewAsteroid($system->name, $i);
        array_push($system->asteroids, $asteroid);
    }
}

function ArtificialBodyGeneration($system, $maxArtificialBodyAmount){

    $firstRound = rand(1, $maxArtificialBodyAmount);

    for ($i = 1; $i <= $firstRound; $i++){
        $artificialBody = GenerateNewArtificialBody();
        array_push($system->artificialBodies, $artificialBody);
    }
}

function StarGeneration($system, $maxStartsPerSystem, $chanceOfAdditionalStar){

    $amountOfStars = 1;

    for ($i = 1; $i <= $maxStartsPerSystem; $i++){
        if (rand(1, 100) >= (100 - $chanceOfAdditionalStar)){
            $amountOfStars++;
        }
    }

    for ($i = 1; $i <= $amountOfStars; $i++){
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
