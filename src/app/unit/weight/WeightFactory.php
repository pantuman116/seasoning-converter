<?php

namespace app\unit\weight;

use app\framework\UnitFactory;

class WeightFactory implements UnitFactory
{
    protected $weightUnitList = [];

    public function __construct()
    {
        $defaultValue = 0.0;
        $this->weightUnitList = [
            'g' => new Gram($defaultValue),
        ];
    }

    public function getUnit(string $unitName): Weight
    {
        return $this->weightUnitList[$unitName];
    }

    public function getUnitList(): array
    {
        return array_keys($this->weightUnitList);
    }
}
