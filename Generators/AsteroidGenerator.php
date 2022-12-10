<?php

include_once('Generators/NameGenerator.php');
require('Objects/Asteroid.php');

function GenerateNewAsteroid(){

    $asteroid = new Asteroid(
        trim(GenerateNewName('asteroid')),
        'rock',
        rand(1,10),
    );

    return $asteroid;
}