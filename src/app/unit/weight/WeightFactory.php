<?php

namespace app\unit\weight;

use app\framework\UnitFactory;

class WeightFactory implements UnitFactory
{
    /** @var array<Weight> */
    protected $weightUnitList = [];

    public function __construct()
    {
        $defaultValue = 0.0;
        $this->weightUnitList = [
            'g' => new Gram($defaultValue),
            'ポンド' => new Pound($defaultValue),
            'オンス' => new Ounce($defaultValue),
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
