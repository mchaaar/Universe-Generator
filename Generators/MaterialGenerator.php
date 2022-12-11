<?php

function GenerateNewMaterial(string $type){

    $materialFile = "Lists/Materials.txt";
    $materials = file($materialFile);

    $chosenMaterials = [];
    $previousPicks = [];

    switch ($type){
        case 'asteroid':
            if (rand(1, 100) < 80){
                array_push($chosenMaterials, trim($materials[0]));
                array_push($chosenMaterials, trim($materials[1]));
            }
            else {
                for ($i = 0; $i < rand(2, 6); $i++){
                    $pick = rand(2, 7);
                    if (!in_array($pick, $previousPicks)){
                        array_push($chosenMaterials, trim($materials[$pick]));
                        array_push($previousPicks, $pick);
                    }
                    else {
                        $i -= 1;
                    }
                }
            }
            return $chosenMaterials;
        case 'artificial':
            return 'steel';
    }
}
