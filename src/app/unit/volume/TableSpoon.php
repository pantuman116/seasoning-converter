<?php

namespace app\unit\volume;

use app\unit\volume\Volume;

class TableSpoon implements Volume
{
    protected float $value;
    protected const BASE_UNIT_COEFFICIENT = 15.0;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function getName(): string
    {
        return '大さじ';
    }

    public function getTableNotation(): string
    {
        return 'tablespoon';
    }

    public function getBaseUnitValue(): float
    {
        return $this->value * self::BASE_UNIT_COEFFICIENT;
    }

    public function getBaseUnitCoefficient(): float
    {
        return self::BASE_UNIT_COEFFICIENT;
    }

    public function changeValue(float $value): TableSpoon
    {
        return new TableSpoon($value);
    }
}
