<?php

include_once('../Generators/NameGenerator.php');
include_once('../Generators/MaterialGenerator.php');
require('../Objects/Asteroid.php');

function GenerateNewAsteroid(string $systemName, int $i){

    $asteroid = new Asteroid(
        strtoupper(substr($systemName, 0, 3)) . '-' . CreateFiveLetters(),
    );

    $asteroid->materials = GenerateNewMaterial('asteroid');
    
    return $asteroid;
}

function CreateFiveLetters(){

    $name = '';

    for ($i = 1; $i < 6; $i++){
        $name .= chr(rand(65, 90));
    }

    return trim($name);
}