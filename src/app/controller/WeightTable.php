<?php

// require_once __DIR__ . '/../api/escape.php';
require_once __DIR__ . "/../../vendor/autoload.php";

use app\controller\Database;

$db = new Database();
$weights = $db->getWeights();

$title = '重量表一覧';
$contents = __DIR__ . '/../../views/pages/WeightTable.php';
include __DIR__ . '/../../views/pages/Layout.php';
