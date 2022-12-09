<?php

require('Settings/GeneralSettings.txt');

function LoadSettings(){

    $settingsFile = "Settings/GeneralSettings.txt";
    $settings = file($settingsFile);
    $cleanSettings = [];

    for ($i = 0; $i < count($settings); $i++){
        $cleanSetting = explode(" ", $settings[$i]);
        array_push($cleanSettings, $cleanSetting[1]);
    }

    var_dump($cleanSettings);

}
