<?php

include_once('../Generators/NameGenerator.php');
include_once('../Generators/MaterialGenerator.php');
require('../Objects/naturalBody.php');

function GenerateNewNaturalBody(){

    $naturalBody = new NaturalBody(
        trim(GenerateNewName('naturalBody')),
    );

    return $naturalBody;
}