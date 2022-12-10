<?php

use function PHPSTORM_META\type;

include_once('Generators/NameGenerator.php');
require('Generators/PlanetGenerator.php');
require('Objects/System.php');
require('Generators/RomanGenerator.php');

function GenerateNewSystem($maxPlanetsPerSystem){

    $system = new System(GenerateNewName('system'));
    $planetOccurences = array();
    $firstIteration = rand(0, $maxPlanetsPerSystem - 1);
    
    for ($i = $firstIteration; $i < $maxPlanetsPerSystem; $i++){

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
        }

        else{
            $i -= 1;
        }
    }
    return $system;
}