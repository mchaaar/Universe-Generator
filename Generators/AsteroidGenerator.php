<?php

include_once('Generators/NameGenerator.php');
include_once('Generators/MaterialGenerator.php');
require('Objects/Asteroid.php');

function GenerateNewAsteroid(){

    $asteroid = new Asteroid(
        trim(GenerateNewName('asteroid')),
        rand(1,10),
    );

    $asteroid->materials = GenerateNewMaterial('asteroid');

    return $asteroid;
}