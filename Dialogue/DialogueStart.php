<?php

require('../Generators/UniverseGenerator.php');
require_once('../Settings/SettingsLoader.php');

function StartDialogue(){
    
    printf (
        "\n" .
        "\n" .
        "Welcome to the Universe Generator !" .
        "\n" .
        "You can modify the generation settings in 'Settings/GeneralSettings.txt'" .
        "\n" .
        "Press any key to start generating" .
        "\n" .
        "\n"
    );

    readline();
    GenerateNewUniverse(LoadSettings());

    printf (
        "Generation is done !" .
        "\n" .
        "You can find your generation output in 'Output/'" .
        "\n"
    );
}
