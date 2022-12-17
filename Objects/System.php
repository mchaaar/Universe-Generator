<?php

class System {

    public string $name;
    public $planets = [];
    public $asteroids = [];
    public $stars = [];
    public $artificialBodies = [];

    public function __construct(string $name) {
        $this->name = $name;
    }
}
