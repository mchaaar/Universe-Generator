<?php

require('Generators/PlanetGenerator.php');
require('Generators/SystemGenerator.php');

$planet = GenerateNewPlanet();
$system = GenerateNewSystem();

var_dump($planet);
var_dump($system);
