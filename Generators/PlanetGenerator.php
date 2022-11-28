<?php

require('Objects/Planet.php');
require('Generators/NameGenerator.php');

function GenerateNewPlanet(){
    
    $planet = new Planet(GenerateNewName('human'));
    return $planet;
}
