<?php

require('Objects/Planet.php');
include_once('Generators/NameGenerator.php');

global $usedNames;

function GenerateNewPlanet(){

    global $usedNames;

    $planet = new Planet(
        GenerateNewName('planet'),
        rand(1, 10),
        rand(1, 10) <= 3 ? true : false,
        rand(1, 100) <= 90 ? rand(1, 30) : rand(31, 100),
        GenerateInhabitants(),
    );

    if ($planet->inhabited){
        $planet->diplomaticScale = $planet->inhabitantsAmount <= 9 ? 1 : $planet->inhabitantsAmount / 10 ;
    }
    
    $usedNames = 1;
    return $planet;
}

function GenerateInhabitants(){

    $amount = 1;
    $random = rand(1, 100);

    if ($random >= 80){
        $amount = $random >= 90 ? rand(61, 100) : rand(41, 60);
    } else {
        $amount = rand(1, 100) <= 70 ? rand(1, 20) : rand(21, 40);
    }

    return $amount;
}

function CheckForSameName(string $name){

    $result = false;

    switch ($type){
        case 'planet':
            if (in_array($name, $usedPlanetNames)){
                $result = true;
            }
            break;
        case 'system':
            if (in_array($name, $usedSystemNames)){
                $result = true;
            }
            break;
    }

    return $result;
}
