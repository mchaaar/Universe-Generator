<?php

require('Objects/Planet.php');
include_once('Generators/NameGenerator.php');
include_once('Generators/NaturalBodyGenerator.php');

function GenerateNewPlanet($minInhabitants, $maxInhabitants, $minPlanetSize, $maxPlanetSize, $inhabitedChance, $maxNaturalBodies, $naturalBodyChance){

    $planet = new Planet(
        trim(GenerateNewName('planet')),
        rand($minPlanetSize, $maxPlanetSize),
        rand(1, 100) >= (100 - $inhabitedChance) ? true : false,
        rand($minInhabitants, $maxInhabitants),
    );
    
    $naturalBodyAmount = rand(0, $maxNaturalBodies);

    for ($i = 1; $i <= $naturalBodyAmount; $i++) {
        if (rand(1, 100) >= 100 - $naturalBodyChance){
            array_push($planet->naturalBodies, GenerateNewNaturalBody());
        }
    }

    return $planet;
}
