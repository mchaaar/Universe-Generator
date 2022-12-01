<?php

require('Generators/SystemGenerator.php');

$systems = [];

for ($i = 1; $i <= 1; $i++){
    $system = GenerateNewSystem();
    array_push($systems, $system);
    $fileName = $i . '-' . trim($system->name);
    fopen('Output/' . $fileName . '.txt', 'w');
}
