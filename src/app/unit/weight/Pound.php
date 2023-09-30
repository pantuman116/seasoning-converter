<?php

namespace app\unit\weight;

use app\unit\weight\Weight;

class Pound implements Weight
{
    protected float $value;
    protected const BASE_UNIT_COEFFICIENT = 453.6;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function getName(): string
    {
        return 'g';
    }
    public function getBaseUnitValue(): float
    {
        return $this->value * self::BASE_UNIT_COEFFICIENT;
    }

    public function getBaseUnitCoefficient(): float
    {
        return self::BASE_UNIT_COEFFICIENT;
    }

    public function changeValue(float $value): Pound
    {
        return new Pound($value);
    }
}
