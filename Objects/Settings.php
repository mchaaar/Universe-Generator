<?php

class Settings {

    public int $systemsPerUniverse;
    public int $minPlanetsPerSystem;
    public int $maxPlanetsPerSystem;
    public int $minInhabitantsPerPlanet;
    public int $maxInhabitantsPerPlanet;

    public string $selectedOutput;
    public bool $deleteOldGeneration;

    public function __construct(
        $systemsPerUniverse,
        $minPlanetsPerSystem,
        $maxPlanetsPerSystem,
        $minInhabitantsPerPlanet,
        $maxInhabitantsPerPlanet,
        $selectedOutput,
        $deleteOldGeneration){
            
        $this->$systemsPerUniverse = $systemsPerUniverse;
        $this->$minPlanetsPerSystem = $minPlanetsPerSystem;
        $this->$maxPlanetsPerSystem = $maxPlanetsPerSystem;
        $this->$minInhabitantsPerPlanet = $minInhabitantsPerPlanet;
        $this->$maxInhabitantsPerPlanet = $maxInhabitantsPerPlanet;
        $this->$selectedOutput = $selectedOutput;
        $this->$deleteOldGeneration = $deleteOldGeneration;
    }
}
