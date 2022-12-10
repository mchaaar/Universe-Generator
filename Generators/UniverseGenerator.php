<?php

require('Generators/SystemGenerator.php');

$systems = [];

function GenerateNewUniverse(int $amountOfSystems, int $maxPlanetsPerSystem, string $outputType, bool $deleteOldFiles = true){

    global $systems;

    if ($deleteOldFiles){
        DeleteOldFiles();
    }

    for ($i = 1; $i <= $amountOfSystems; $i++){

        $system = GenerateNewSystem($maxPlanetsPerSystem, $i, $outputType);
        array_push($systems, $system);
    }
}

function DeleteOldFiles(){

    $files = glob('Output'.'/*'); 
   
    foreach($files as $file) {

        if (is_file($file)) {
            unlink($file); 
        }
    }
}
