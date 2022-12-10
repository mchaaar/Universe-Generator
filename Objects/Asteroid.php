<?php

class Asteroid {
    
    public string $name;
    public string $material;
    public int $size;

    public function __construct($name, $material, $size){
        $this->name = $name;
        $this->material = $material;
        $this->size = $size;
    }
}