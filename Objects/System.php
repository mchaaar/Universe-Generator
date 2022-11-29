<?php

class System {

    protected string $name;
    public $planets;

    public function __construct(string $name) {
        $this->name = $name;
    }
}
