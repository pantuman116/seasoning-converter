<?php

namespace app\unit\volume;

use app\unit\volume\Volume;

class Milliliter implements Volume
{
    protected float $value;
    protected const BASE_UNIT_COEFFICIENT = 1.0;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function getName(): string
    {
        return 'ml';
    }

    public function getBaseUnitValue(): float
    {
        return $this->value * self::BASE_UNIT_COEFFICIENT;
    }

    public function getBaseUnitCoefficient(): float
    {
        return self::BASE_UNIT_COEFFICIENT;
    }

    public function changeValue(float $value): Milliliter
    {
        return new Milliliter($value);
    }
}
