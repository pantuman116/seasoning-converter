<?php

namespace app;

require_once 'UnitConversion.php';
require_once 'MainValue.php';

use app\UnitConversion;
use app\MainValue;


class UnitConversionVolumeWeight implements UnitConversion
{
    protected float $conversionCoefficient;
    protected MainValue $mainValue;
    protected float $mainUnit;
    protected SubValue $subValue;
    protected float $subUnit;

    public function __construct($conversionCoefficient, MainValue $mainValue, $mainUnit, SubValue $subValue, $subUnit)
    {
        $this->conversionCoefficient = $conversionCoefficient;
        $this->mainValue = $mainValue;
        $this->mainUnit = $mainUnit;
        $this->subValue = $subValue;
        $this->subUnit = $subUnit;
    }
    public function calcMainValue(): float
    {
        return ($this->subValue->getValue() * $this->subUnit) / $this->mainUnit / $this->conversionCoefficient;
    }

    public function calcSubValue(): float
    {
        return ($this->mainValue->getValue() * $this->mainUnit) / $this->subUnit * $this->conversionCoefficient;
    }
}
