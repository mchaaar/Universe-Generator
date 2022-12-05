<?php

require('Generators/SystemGenerator.php');

$systems = [];

DeleteOldFiles();

for ($i = 1; $i <= 10; $i++){
    $system = GenerateNewSystem();
    array_push($systems, $system);
    $fileName = $i . '-' . trim($system->name);
    fopen('Output/' . $fileName . '.txt', 'w');
}

var_dump($systems);

function DeleteOldFiles(){

    $files = glob('Output'.'/*'); 
   
    foreach($files as $file) {

        if(is_file($file)) {
            unlink($file); 
        }
    }
}
