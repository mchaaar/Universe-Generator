<?php

require('Objects/Planet.php');
require('Generators/NameGenerator.php');

function GenerateNewPlanet(){

    $planet = new Planet(GenerateNewName('planet'), rand(1, 10));
    return $planet;
}
