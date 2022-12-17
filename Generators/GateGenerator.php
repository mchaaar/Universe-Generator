<?php

require('Objects/Gate.php');

function GenerateNewGate(string $systemName){

    $gateName = 'GATE ' . strtoupper(substr($systemName, 0, 3)) . '-' . GenerateFiveLetters();
    $gate = new Gate($gateName);

    return $gate;
}

function GenerateFiveLetters(){

    $name = '';

    for ($i = 1; $i < 6; $i++){
        $name .= chr(rand(65, 90));
    }

    return trim($name);
}
