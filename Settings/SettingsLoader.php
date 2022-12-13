<?php

require('Objects/Settings.php');

function LoadSettings(){

    $settingsFile = "Settings/GeneralSettings.txt";
    $settings = file($settingsFile);
    $cleanSettings = [];

    for ($i = 0; $i < count($settings); $i++){
        $cleanSetting = explode('=', $settings[$i]);
        array_push($cleanSettings, trim($cleanSetting[1]));
    }

    $finalSettings = new Settings();

    var_dump($cleanSettings);
    return $finalSettings;
}
