<?php

class System {

    public string $name;
    public $planets = [];
    public $asteroids = [];
    public $artificialBodies = [];
    public $gates = [];

    public function __construct(string $name) {
        $this->name = $name;
    }
}
