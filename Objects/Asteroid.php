<?php

class Asteroid {
    
    public string $name;
    public int $size;
    public $materials = [];

    public function __construct($name, $size){
        $this->name = $name;
        $this->size = $size;
    }
}