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

use app\converter\VolumeWeight;
use app\converter\VolumeWeightCoefficientSeasoning;
use app\unit\volume\VolumeFactory;
use app\unit\weight\WeightFactory;

$mainValue = 1;
$subValue = 42;

//Unit生成
$volumeFactory = new VolumeFactory();
$weightFactory = new WeightFactory();

$mainUnit = $volumeFactory->getUnit('大さじ');
$mainUnit = $mainUnit->changeValue($mainValue);

$subUnit = $weightFactory->getUnit('g');
$subUnit = $subUnit->changeValue($subValue);

//Converter生成
$conversionCoefficient = new VolumeWeightCoefficientSeasoning('はちみつ');
$converter = new VolumeWeight($conversionCoefficient, $mainUnit, $subUnit);

//Converter計算
$subValue = $converter->calcSubValue();
echo $subValue . PHP_EOL;

$mainValue = $converter->calcMainValue();
echo $mainValue . PHP_EOL;
