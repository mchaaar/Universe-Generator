<?php

require('Generators/UniverseGenerator.php');

parse_str(implode('&', array_slice($argv, 1)), $_GET);

if (CheckForErrors($argv)){
    var_dump(true);
} else {
    var_dump(false);
}

function CheckForErrors($args){

    $result = true;

    if (count($args) > 4){
        $result = false;
    }

    return $result;
}
