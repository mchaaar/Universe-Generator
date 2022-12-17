<?php

require('Objects/Star.php');
include_once('Generators/NameGenerator.php');

function GenerateNewStar(string $systemName) {
    $star = new Star(
        trim(GenerateNewName('star')),
        StarType(),
    );

    return $star;
}

function StarType() {
    
    $type = [
        "Red Dwarf",
        "Black Dwarf",
        "Yellow Dwarf",
        "Brown Dwarf",
        "White Dwarf",
        "Red Giant",
        "Blue Giant",
        "Red Supergiant",
        "Blue Supergiant",
    ];

    return $type[rand(0, count($type) -1)];
}