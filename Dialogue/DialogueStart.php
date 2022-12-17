<?php

require('Generators/UniverseGenerator.php');
require_once('Settings/SettingsLoader.php');

//parse_str(implode('&', array_slice($argv, 1)), $_GET);

function StartDialogue(){
    
    printf (
        "\n" .
        "Welcome to the Universe Generator !" .
        "\n" .
        "Do you want to generate using the settings located in 'Settings/GeneralSettings' ?" .
        "\n" .
        "( yes / no )" . "\n"
    );

    $generateWithSettings = readline();

    if ($generateWithSettings == "yes"){
        $settings = LoadSettings();
        GenerateNewUniverse($settings);
    }

    elseif ($generateWithSettings == "no"){
        AreYouSure();
    }

    else {
        printf("\n" . "Error : You must type yes or no." . "\n");
        StartDialogue();
    }

    //GenerateNewUniverse($settings);
}

function AreYouSure(){

    printf (
        "\n" . 
        "A few questions regarding the generation will be asked." .
        "\n" .
        "Are you sure you want to continue ?" .
        "\n" .
        "( yes to continue / no to go back )" . "\n"
    );

    $areYouSure = readline();

    if ($areYouSure == "yes"){
        CreateNewSettings();
    }

    elseif ($areYouSure == "no"){
        StartDialogue();
    }

    else {
        printf("\n" . "Error : You must type yes or no." . "\n");
        AreYouSure();
    }

}

function CreateNewSettings(){

    

}
