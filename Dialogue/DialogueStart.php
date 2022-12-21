<?php

require('Generators/UniverseGenerator.php');
require_once('Settings/SettingsLoader.php');

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

    $newSettings = [];

    printf("How many systems should be in the Universe ?" . "\n" . "\n");
    $questionOne = readline();

    printf($questionOne);

    // Add all possible settings in Settings/GeneralSettings
}

/*
[Ideal amount between 1 & 100 but there is no limit]
SYSTEMS_PER_UNIVERSE = 1

[Ideal amount between 1 & 20 but there is no limit]
MIN_PLANETS_PER_SYSTEM = 1

[Ideal amount between 1 & 40 but there is no limit]
MAX_PLANETS_PER_SYSTEM = 10

[Ideal amount is 1 but there is no limit (1 = 1 Billion)]
MIN_INHABITANTS_PER_PLANETS = 1

[Ideal amount is 100 but there is no limit (1 = 1 Billion)]
MAX_INHABITANTS_PER_PLANETS = 10

[1 = yes | any over number = no (Deletes the last batch of generated content)]
DELETE_OLD_GENERATION = 1

[1 = txt]
SELECTED_OUTPUT = 1

[Ideal amount between val & val but there is no limit]
MAX_ASTEROIDS_PER_SYSTEM = 25

[Ideal amount between val & val but there is no limit]
MAX_ARTIFICIALBODIES_PER_SYSTEM = 25

[Chance of Naturalbody per Planet, between 1 and 100 in Percent]
CHANCE_OF_NATURALBODY = 20

[Ideal amount between val & val but there is no limit]
MAX_STARS_PER_SYSTEM = 3

[Chance of another star spawning per System, between 1 and 100 in Percent but should stay low]
CHANCE_OF_ADDITIONAL_STAR = 5

[Ideal amount is 1 but there is no limit]
MIN_PLANET_SIZE = 1

[Ideal amount is 10 but there is no limit]
MAX_PLANET_SIZE = 10

[Chance of the planet being inhabited between 1 and 100 in Percent]
CHANCE_OF_PLANET_INHABITED = 10

[Ideal amount between 1 and 3 but there is no limit]
MAX_NATURALBODIES_PER_PLANET = 3
*/