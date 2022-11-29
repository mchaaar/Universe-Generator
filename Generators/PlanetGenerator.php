<?php

require('Objects/Planet.php');
require('Generators/NameGenerator.php');

function GenerateNewPlanet(){

    $planet = new Planet(
        GenerateNewName('planet'),
        rand(1, 10),
        rand(1, 10) <= 3 ? true : false,
        rand(1, 100) <= 90 ? rand(1, 30) : rand(31, 100),
    );
    
    return $planet;
}
