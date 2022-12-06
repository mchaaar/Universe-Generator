<?php

include_once('Generators/NameGenerator.php');
require('Generators/PlanetGenerator.php');
require('Objects/System.php');

function GenerateNewSystem($maxPlanetsPerSystem){

    $system = new System(GenerateNewName('system'));

    for ($i = rand(0, $maxPlanetsPerSystem - 1); $i < $maxPlanetsPerSystem; $i++){
        $planet = GenerateNewPlanet();
        array_push($system->planets, $planet);
        array_push($system->planetNames, $planet->name);
    }

    return $system;
}
