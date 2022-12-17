<?php

class Asteroid {
    
    public string $name;
    public $materials = [];

    public function __construct($name){
        $this->name = $name;
    }
}