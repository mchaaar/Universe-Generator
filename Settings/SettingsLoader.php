<?php

require('../Objects/Settings.php');

function LoadSettings(){

    $settingsFile = "../Settings/GeneralSettings.txt";
    $allSettings = file($settingsFile);

    $settings = [];

    for ($i = 1; $i < count($allSettings); $i += 3){
        $cleanSetting = explode('=', $allSettings[$i]);
        array_push($settings, intval($cleanSetting[1]));
    }
    
    return $settings;
}
