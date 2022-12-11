<?php

class ArtificialBody {
    
    public string $name;
    public int $size;
    public $materials = [];
    //public string $civilizationCreated;

    public function __construct($name, $size){
        $this->name = $name;
        $this->size = $size;
    }
}