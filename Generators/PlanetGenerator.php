<?php

require('Objects/Planet.php');
include_once('Generators/NameGenerator.php');
include_once('Generators/NaturalBodyGenerator.php');



function GenerateNewPlanet($systemName, $minInhabitants, $maxInhabitants, $minPlanetSize, $maxPlanetSize, $inhabitedChance, $maxNaturalBodies, $naturalBodyChance){

    $planet = new Planet(
        trim(GenerateNewName('planet')),
        rand($minPlanetSize, $maxPlanetSize),
        rand(1, 100) >= (100 - $inhabitedChance) ? true : false,
        rand($minInhabitants, $maxInhabitants),
    );
    
    $naturalBodyAmount = rand(0, $maxNaturalBodies);

    for ($i = 1; $i <= $naturalBodyAmount; $i++) {
        if (rand(1, 100) >= 100 - $naturalBodyChance){
            array_push($planet->naturalBodies, GenerateNewNaturalBody());
        }
    }
    $text = '';
    OutputPlanet($planet, $text, $systemName);
    return $planet;
}

function OutputPlanet($planet, $text, $systemName){
    fopen('Output/' . $systemName . "/" . "-Planets/" . $planet->name . '.txt', 'w');
    $text .= 'Planet: ' . $planet->name . "\n\n";
    $text .= '  -Size: ' . $planet->size . "\n";
    $text .= '  -Inhabited: ';
    $text .= $planet->inhabited ? 'yes' . "\n" : 'no' . "\n";

    if ($planet->inhabited){
        $text .= '  -Inhabitants Amount: ' . $planet->inhabitantsAmount . "\n";
    }

    $text .= "  -Natural Bodies: ";
    $text .= !empty($planet->naturalBodies) ? 'yes' . "\n" : 'no' . "\n";

    if (!empty($planet->naturalBodies)){

        for ($i = 0; $i < count($planet->naturalBodies); $i++){
            $text .= "      -" . $planet->naturalBodies[$i]->name . "\n";
        }

    } 

    file_put_contents('Output/' . $systemName . "/" . "-Planets/" . $planet->name . '.txt', $text);
}