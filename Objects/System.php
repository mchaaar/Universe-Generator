<?php

class System {

    public string $name;
    public $planets = [];

    public function __construct(string $name) {
        $this->name = $name;
    }
}
