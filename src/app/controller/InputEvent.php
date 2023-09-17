<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use app\converter\VolumeWeight;
use app\converter\VolumeWeightCoefficientSeasoning;
use app\unit\volume\VolumeFactory;
use app\unit\weight\WeightFactory;

//リクエスト受信
$changeType = $_POST['changeType'];
$seasoning = $_POST['seasoning'];
$mainValue = $_POST['mainValue'];
$mainUnit = $_POST['mainUnit'];
$subValue = $_POST['subValue'];
$subUnit = $_POST['subUnit'];

//Unit生成
$volumeFactory = new VolumeFactory();
$weightFactory = new WeightFactory();

$mainUnit = $volumeFactory->getUnit($mainUnit);
if ($mainValue !== "") {
    $mainUnit = $mainUnit->changeValue($mainValue);
}

$subUnit = $weightFactory->getUnit($subUnit);
if ($subValue !== "") {
    $subUnit = $subUnit->changeValue($subValue);
}

//Converter生成
$conversionCoefficient = new VolumeWeightCoefficientSeasoning($seasoning);
$converter = new VolumeWeight($conversionCoefficient, $mainUnit, $subUnit);

//Converter計算
if ($changeType === 'subValue') {
    $mainValue = $converter->calcMainValue();
} else {
    $subValue = $converter->calcSubValue();
}

//レスポンス
$response = [
    'mainValue' => "$mainValue",
    'subValue' => "$subValue",
];

echo json_encode($response);
