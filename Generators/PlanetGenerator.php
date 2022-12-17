<?php

require('Objects/Planet.php');
include_once('Generators/NameGenerator.php');
include_once('Generators/NaturalBodyGenerator.php');

function GenerateNewPlanet($minInhabitants, $maxInhabitants){

    $planet = new Planet(
        trim(GenerateNewName('planet')),
        rand(1, 10),
        rand(1, 10) <= 2 ? true : false,
        rand($minInhabitants, $maxInhabitants),
    );

    for ($i = rand(0,1); $i < 2; $i++) {
        if (rand(1,100) >= 90){
            array_push($planet->naturalBodies, GenerateNewNaturalBody());
        }
    }
    return $planet;
}
