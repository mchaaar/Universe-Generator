<?php

use function PHPSTORM_META\type;

include_once('../Generators/NameGenerator.php');
require('../Generators/ArtificialBodyGenerator.php');
require('../Generators/AsteroidGenerator.php');
require('../Generators/StarGenerator.php');
require('../Generators/PlanetGenerator.php');
require('../Generators/RomanGenerator.php');
require('../Generators/GateGenerator.php');
require('../Objects/System.php');

$entries = '';

function GenerateNewSystem($settings, $fileIndex){

    global $entries;

    $system = new System(GenerateNewName('system') . '-' . CreateThreeLetters());
    $planetOccurences = array();
    $planetAmount = rand($settings[1], $settings[2]);
    
    array_push($system->gates, GenerateNewGate($system->name));
    
    if ($settings[6] == 1){
        $fileName = $fileIndex . '-' . trim($system->name);
        $path = "../Output/" . $system->name;
        mkdir($path);
        fopen($path . "/" . $system->name . '.txt', 'w');
        mkdir($path . "/-Planets");
    }
    
    for ($i = 1; $i <= $planetAmount; $i++){

        $planet = GenerateNewPlanet($system->name, $settings[3], $settings[4], $settings[12], $settings[13], $settings[14], $settings[15], $settings[9]);
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
    AsteroidGeneration($system, $settings[7]);
    StarGeneration($system, $settings[10], $settings[11]);
    ArtificialBodyGeneration($system, $settings[8]);
    generateText($system, $planetAmount, $settings[16]);
    file_put_contents($path . "/" . $system->name . '.txt', $entries);
    return $system;
}

function FinalChecks(System $system, Planet $planet, string $fileName, bool $occured, bool $valid, int $i){

    if ($occured == false){
        $planetOccurences[$planet->name] = 1;
        $valid = true;
    }

    if ($valid){
        array_push($system->planets, $planet);
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

function generateText($system, $planetAmount, $asteroidOutput){

    global $entries;
    $entries = 'System Name: ' . $system->name . "\n\n" . 'Amount of Planets: ' . $planetAmount . "\n\n";
    $entries .= "Amount of Asteroids: " . count($system->asteroids) . "\n";

    if ($asteroidOutput == 1 && !empty($system->asteroids)) {
        for ($i = 0; $i < count($system->asteroids); $i++) {
            $entries .= '   Asteroid ' .$i+1 . ": " . trim($system->asteroids[$i]->name) . "\n";
        }
    }
    $entries .= "\n";
    $entries .= "Amount of Stars: " . count($system->stars) . "\n";
    if (!empty($system->stars)) {
        for ($i = 0; $i < count($system->stars); $i++) {
            $entries .= '   Star ' .$i+1 . ": " . trim($system->stars[$i]->name) . "\n";
        }
    }
    $entries .= "\n";
    $entries .= "Amount of Artificial Bodies: " . count($system->artificialBodies) . "\n";
    if (!empty($system->artificialBodies)) {
        for ($i = 0; $i < count($system->artificialBodies); $i++) {
            $entries .= '   A-Body ' .$i+1 . ": " . trim($system->artificialBodies[$i]->name) . "\n";
        }
    }
    $entries .= "\n";
    $entries .= "Amount of Gates: " . count($system->gates) . "\n";
    $entries .= '   Gate: ' . trim($system->gates[0]->name);
}

function CreateThreeLetters(){

    $name = '';

    for ($i = 1; $i < 4; $i++){
        $name .= chr(rand(65, 90));
    }

    return trim($name);
}
