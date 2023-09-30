<?php

use app\controller\Database;
use app\unit\volume\VolumeFactory;
use app\unit\weight\WeightFactory;

require_once __DIR__ . "/../../vendor/autoload.php";

$title = '調味料別体積重量変換器';

//調味料リスト取得
$db = new Database();
$seasoningList = $db->getSeasoningList();

//メインユニットリスト取得
$mainUnitFactory = new VolumeFactory();
$mainUnitList = $mainUnitFactory->getUnitList();

//サブユニットリスト取得
$subUnitFactory = new WeightFactory();
$subUnitList = $subUnitFactory->getUnitList();

$contents = __DIR__ . '/../../views/pages/Converter.php';
include __DIR__ . '/../../views/pages/Layout.php';
