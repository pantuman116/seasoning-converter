<?php

// require_once __DIR__ . '/../api/escape.php';
require_once __DIR__ . '/../../database/mysqli.php';

$link = dbConnect();
$weights = listWeights($link);
mysqli_close($link);

$title = '重量表一覧';
$contents = __DIR__ . '/../../views/pages/WeightTable.php';
include __DIR__ . '/../../views/pages/Layout.php';
