<?php

class Planet {

    protected string $name;
    protected int $size;
    
    public function __construct(string $name, int $size) {
        $this->name = $name;
        $this->size = $size;
    }
}
