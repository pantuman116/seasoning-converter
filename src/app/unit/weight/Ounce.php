<?php

namespace app\unit\weight;

use app\unit\weight\Weight;

class Ounce implements Weight
{
    protected float $value;
    protected const BASE_UNIT_COEFFICIENT = 28.35;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function getName(): string
    {
        return 'oz';
    }
    public function getBaseUnitValue(): float
    {
        return $this->value * self::BASE_UNIT_COEFFICIENT;
    }

    public function getBaseUnitCoefficient(): float
    {
        return self::BASE_UNIT_COEFFICIENT;
    }

    public function changeValue(float $value): Ounce
    {
        return new Ounce($value);
    }
}
