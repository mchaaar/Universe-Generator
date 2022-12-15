<?php

require('Generators/UniverseGenerator.php');
require('Dialogue/DialogueStart.php');

StartDialogue();

/*$defaultGen = [
    10,     // amount of systems generated.
    12,     // maximum amount of planets per system generated.
    'txt',  // output selected.
    true    // will the old generated files be deleted upon new generation.
];

$allowedOutputTypes = ['txt'];
$allowedFourthArguments = ['true', 'false'];

parse_str(implode('&', array_slice($argv, 1)), $_GET);

if (count($argv) == 1){
    GenerateNewUniverse($defaultGen[0], $defaultGen[1], $defaultGen[2], $defaultGen[3]);
}

else if (count($argv) == 5 && CheckForErrors($argv)){
    GenerateNewUniverse($argv[1], $argv[2], $argv[3], $argv[4] == 'true' ? true : false);
}

function CheckForErrors($args){

    $a = array(new TestCheck);

    global $allowedOutputTypes;
    global $allowedFourthArguments;
    
    $result = true;

    if ($args[1] < 0){
        $result = false;
    } else if ($args[1] > 10000) {
        $result = false;
    }

    if ($args[2] < 0){
        $result = false;
    } else if ($args[2] > 100){
        $result = false;
    }

    if (!in_array($args[3], $allowedOutputTypes)){
        $result = false;
    }

    if (!in_array($args[4], $allowedFourthArguments)){
        $result = false;
    }

    return $result;
}

class TestCheck {
    public string $name;
    public int $amount;
}
*/