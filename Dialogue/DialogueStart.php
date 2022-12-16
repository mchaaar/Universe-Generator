<?php

require('Generators/UniverseGenerator.php');
require_once('Settings/SettingsLoader.php');

//parse_str(implode('&', array_slice($argv, 1)), $_GET);

function StartDialogue(){
    
    $settings = LoadSettings();
    GenerateNewUniverse($settings);

}
