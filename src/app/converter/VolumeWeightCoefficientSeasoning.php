<?php

namespace app\converter;

use app\converter\VolumeWeightCoefficient;
use app\controller\Database;

class VolumeWeightCoefficientSeasoning implements VolumeWeightCoefficient
{
    protected float $value;

    public function __construct(string $target)
    {
        $defWeightTablespoon = 15.0;
        $dbObj = new Database();
        $weightsTablespoon = $dbObj->getWeightTableSpoon();
        $this->value = (float)$weightsTablespoon[$target] / $defWeightTablespoon;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function changeValue(string $target): VolumeWeightCoefficientSeasoning
    {
        return new VolumeWeightCoefficientSeasoning($target);
    }
}
