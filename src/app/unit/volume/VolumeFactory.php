<?php

namespace app\unit\volume;

use app\framework\UnitFactory;

class VolumeFactory implements UnitFactory
{
    protected $volumeUnitList = [];

    public function __construct()
    {
        $defaultValue = 0.0;
        $this->volumeUnitList = [
            '大さじ' => new TableSpoon($defaultValue),
            'ml' => new Ml($defaultValue),
        ];
    }

    public function getUnit(string $unitName): Volume
    {
        return $this->volumeUnitList[$unitName];
    }

    public function getUnitList(): array
    {
        return array_keys($this->volumeUnitList);
    }
}
