<?php

namespace app\converter;

use app\converter\VolumeWeightCoefficient;
use app\controller\Database;

class VolumeWeightCoefficientSeasoning implements VolumeWeightCoefficient
{
    protected float $value;

    public function __construct(string $target)
    {
        $defaultWeightTablespoon = 15.0;
        $db = new Database();
        $weightsTablespoon = $db->getWeightTableSpoon();
        $this->value = $weightsTablespoon[$target] / $defaultWeightTablespoon;
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
