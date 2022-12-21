<?php

require('../Generators/SystemGenerator.php');

$systems = [];

function GenerateNewUniverse($settings){

    global $systems;

    if ($settings[5] == 1){
        DeleteOldFiles();
    }

    for ($i = 1; $i <= $settings[0]; $i++){
        $system = GenerateNewSystem($settings, $i);
        array_push($systems, $system);
    }
}

function DeleteOldFiles(){
    $things = glob('../Output'.'/*');
   
    foreach ($things as $thing) {
        if (is_dir($thing)) {
            $firstDirs = glob($thing . "/*");
            $planets = glob($firstDirs[0]. "/*");
            foreach ($planets as $planet) {
                if (is_file($planet)) {
                    unlink($planet);
                }
            }
            if (is_file($firstDirs[1])) {
                unlink($firstDirs[1]);
            }
            if (is_dir($firstDirs[0])) {
                rmdir($firstDirs[0]);
            }
            rmdir($thing);
        }
    }
}
