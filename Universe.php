<?php

require('Generators/SystemGenerator.php');

$systems = [];

for ($i = 0; $i < 1; $i++){
    array_push($systems, GenerateNewSystem());
}

var_dump($systems);
