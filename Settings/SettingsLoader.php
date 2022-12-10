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

    $finalSettings = new Settings(
        $cleanSettings[0],
        $cleanSettings[1],
        $cleanSettings[2],
        $cleanSettings[3],
        $cleanSettings[4],
        $cleanSettings[5] == 'true' ? true : false,
        'txt',
    );

    var_dump($cleanSettings);
    return $finalSettings;
}
