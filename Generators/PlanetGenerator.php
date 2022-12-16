<?php

require('Objects/Planet.php');
include_once('Generators/NameGenerator.php');

function GenerateNewPlanet($minInhabitants, $maxInhabitants){

    $planet = new Planet(
        trim(GenerateNewName('planet')),
        rand(1, 10),
        rand(1, 10) <= 2 ? true : false,
        rand($minInhabitants, $maxInhabitants),
    );
    
    return $planet;
}
