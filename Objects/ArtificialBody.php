<?php

class ArtificialBody {
    
    public string $name;
    public string $material;
    public int $size;
    //public string $civilicationCreated;

    public function __construct($name, $size, $material){
        $this->name = $name;
        $this->size = $size;
        $this->material = $material;
    }
}