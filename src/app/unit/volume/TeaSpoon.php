<?php

namespace app\unit\volume;

use app\unit\volume\Volume;

class TeaSpoon implements Volume
{
    protected float $value;
    protected const BASE_UNIT_COEFFICIENT = 5.0;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function getName(): string
    {
        return '小さじ';
    }

    public function getTableNotation(): string
    {
        return 'teaspoon';
    }

    public function getBaseUnitValue(): float
    {
        return $this->value * self::BASE_UNIT_COEFFICIENT;
    }

    public function getBaseUnitCoefficient(): float
    {
        return self::BASE_UNIT_COEFFICIENT;
    }

    public function changeValue(float $value): TeaSpoon
    {
        return new TeaSpoon($value);
    }
}
