<?php

class System {

    public string $name;
    public $planets = [];
    public $asteroids = [];
    public $artificialBodies = [];

    public function __construct(string $name) {
        $this->name = $name;
    }
}
