<?php

function GenerateNewRoman(int $number){

    $result = '';

    $roman = array(
        5 => 'V',
        4 => 'IV',
        3 => 'III',
        2 => 'II',
        1 => 'I',
    );
    
    foreach ($roman as $key => $val){
        if ($number == $key){
            $result = $val;
        }
    }
    
    return $result;
}
