<?php

include_once('Generators/NameGenerator.php');
include_once('Generators/MaterialGenerator.php');
require('Objects/ArtificialBody.php');

function GenerateNewArtificialBody(){

    $artificialBody = new ArtificialBody(
        trim(GenerateNewName('artificialBody')),
    );

    $artificialBody->materials = GenerateNewMaterial('artificial');

    return $artificialBody;
}