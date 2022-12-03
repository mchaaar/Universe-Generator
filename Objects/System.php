<?php

class System {

    public string $name;
    public $planets = [];
    public $planetNames = [];

    public function __construct(string $name) {
        $this->name = $name;
    }
}
