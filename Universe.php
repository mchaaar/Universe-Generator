<?php

require('Objects/System.php');
require('Objects/Planet.php');

$system = new System('The Solar System');
$planet = new Planet('Earth');

var_dump($system);
var_dump($planet);
