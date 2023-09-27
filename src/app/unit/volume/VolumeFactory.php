<?php

namespace app\unit\volume;

use app\framework\UnitFactory;

class VolumeFactory implements UnitFactory
{
    /** @var array<Volume> */
    protected array $volumeUnitList = [];

    public function __construct()
    {
        $defaultValue = 0.0;
        $this->volumeUnitList = [
            '大さじ' => new TableSpoon($defaultValue),
            '小さじ' => new TeaSpoon($defaultValue),
            'カップ' => new Cup($defaultValue),
            'ml' => new Milliliter($defaultValue),
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
