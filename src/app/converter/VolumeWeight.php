<?php

namespace app\converter;

use app\framework\Converter;
use app\unit\volume\Volume;
use app\unit\weight\Weight;
use app\converter\VolumeWeightCoefficient;

class VolumeWeight implements Converter
{
    protected VolumeWeightCoefficient $conversionCoeff;
    protected Volume $volume;
    protected Weight $weight;

    public function __construct(VolumeWeightCoefficient $conversionCoeff, Volume $volume, Weight $weight)
    {
        $this->conversionCoeff = $conversionCoeff;
        $this->volume = $volume;
        $this->weight = $weight;
    }
    public function calcMainValue(): float
    {
        $weightBaseUnitValue = $this->weight->getBaseUnitValue();
        $volumeBaseUnitCoeff = $this->volume->getBaseUnitCoefficient();
        $conversionCoeff = $this->conversionCoeff->getValue();
        return $weightBaseUnitValue / $volumeBaseUnitCoeff / $conversionCoeff;
    }

    public function calcSubValue(): float
    {
        $volumeBaseUnitValue = $this->volume->getBaseUnitValue();
        $weightBaseUnitCoeff = $this->weight->getBaseUnitCoefficient();
        $conversionCoeff = $this->conversionCoeff->getValue();
        return $volumeBaseUnitValue / $weightBaseUnitCoeff * $conversionCoeff;
    }
}
