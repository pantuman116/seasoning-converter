<?php

namespace app\unit\volume;

use app\unit\volume\Volume;

class Cup implements Volume
{
    protected float $value;
    protected const BASE_UNIT_COEFFICIENT = 200.0;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function getName(): string
    {
        return 'カップ';
    }

    public function getTableNotation(): string
    {
        return 'cup';
    }

    public function getBaseUnitValue(): float
    {
        return $this->value * self::BASE_UNIT_COEFFICIENT;
    }

    public function getBaseUnitCoefficient(): float
    {
        return self::BASE_UNIT_COEFFICIENT;
    }

    public function changeValue(float $value): Cup
    {
        return new Cup($value);
    }
}
