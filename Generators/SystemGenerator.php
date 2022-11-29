<?php

require('Objects/System.php');

function GenerateNewSystem(){

    $system = new System('system');

    for ($i = rand(0, 8); $i < 12; $i++){
        $system->planets = GenerateNewPlanet();
    }
}
