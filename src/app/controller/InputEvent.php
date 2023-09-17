<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use app\converter\VolumeWeight;
use app\converter\VolumeWeightCoefficientSeasoning;
use app\unit\volume\VolumeFactory;
use app\unit\weight\WeightFactory;

//リクエスト受信
$mainValue = $_POST['mainValue'];
$subValue = 21;

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
$mainValue = $converter->calcMainValue();

//レスポンス
$response = [
    'subValue' => "$subValue",
];

echo json_encode($response);
