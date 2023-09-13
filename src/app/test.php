<?php

// conversionCoeff はちみつ 1.4　1mlあたりのg(グラム)
// mainValue 1
// mainUnitCoeff 大さじ　15 大さじ1あたりのml
// subValue 1
// subUnitCoeff g(グラム)  1 1gあたりのg(グラム)

// $conversionCoefficient = 1.4;
// $mainValue = 1;
// $mainUnit = 15;
// $subValue = 21;
// $subUnit = 1;

// $result_sub = ($mainValue * $mainUnit) / $subUnit * $conversionCoefficient;
// $result_main = ($subValue * $subUnit) / $mainUnit / $conversionCoefficient;

// require_once 'UnitConversionVolumeWeight.php';
// require_once 'MainValue.php';
// require_once 'SubValue.php';

require_once __DIR__ . "/../vendor/autoload.php";

use app\UnitConversionVolumeWeight;
use app\MainValue;
use app\SubValue;

$mainValue = new MainValue(1);
$subValue = new SubValue(21);

$object = new UnitConversionVolumeWeight(1.4, $mainValue, 15, $subValue, 1);

$subValue = $subValue->changeValue($object->calcSubValue());
echo $subValue->getValue() . PHP_EOL;

$mainValue = $mainValue->changeValue($object->calcMainValue());
echo $mainValue->getValue() . PHP_EOL;
