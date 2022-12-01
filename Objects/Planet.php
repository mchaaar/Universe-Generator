<?php

class Planet {

    protected string $name;
    protected int $size;
    public bool $inhabited;
    public int $inhabitantsAmount;
    public int $diplomaticScale;
    
    public function __construct(string $name, int $size, bool $inhabited, int $inhabitantsAmount, int $diplomaticScale) {
        $this->name = $name;
        $this->size = $size;
        $this->inhabited = $inhabited;
        $this->inhabitantsAmount = $inhabited ? $inhabitantsAmount : 0;
    }
}
