<?php

namespace app\converter;

use app\framework\Converter;
use app\unit\volume\Volume;
use app\unit\weight\Weight;
use app\converter\VolumeWeightCoefficient;

class VolumeWeight implements Converter
{
    protected VolumeWeightCoefficient $conversionCoefficient;
    protected Volume $volume;
    protected Weight $weight;

    public function __construct(VolumeWeightCoefficient $conversionCoefficient, Volume $volume, Weight $weight)
    {
        $this->conversionCoefficient = $conversionCoefficient;
        $this->volume = $volume;
        $this->weight = $weight;
    }
    public function calcMainValue(): float
    {
        return $this->weight->getBaseUnitValue() / $this->volume->getBaseUnitCoefficient() / $this->conversionCoefficient->getValue();
    }

    public function calcSubValue(): float
    {
        return $this->volume->getBaseUnitValue() / $this->weight->getBaseUnitCoefficient() * $this->conversionCoefficient->getValue();
    }
}
