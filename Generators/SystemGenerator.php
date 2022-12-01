<?php

include_once('Generators/NameGenerator.php');
require('Generators/PlanetGenerator.php');
require('Objects/System.php');

function GenerateNewSystem(){

    $system = new System(GenerateNewName('system'));

    for ($i = rand(0, 10); $i < 12; $i++){
        array_push($system->planets, GenerateNewPlanet());
    }

    return $system;
}
