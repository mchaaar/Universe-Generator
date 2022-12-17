<?php

require('Generators/SystemGenerator.php');

$systems = [];

function GenerateNewUniverse($settings){

    global $systems;

    if ($settings[5]){
        DeleteOldFiles();
    }

    for ($i = 1; $i <= $settings[0]; $i++){
        $system = GenerateNewSystem($settings[2], $i, $settings[6], $settings[3], $settings[4]);
        array_push($systems, $system);
        //var_dump($system);
    }
}

function DeleteOldFiles(){

    $files = glob('Output'.'/*');
    $keep = 'Output/infos.txt';
   
    foreach($files as $file) {

        if (is_file($file) && basename($file) != basename($keep)) {
            unlink($file); 
        }
    }
}
