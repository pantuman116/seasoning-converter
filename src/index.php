<?php

// require_once __DIR__ . '/lib/escape.php';
require_once __DIR__ . '/lib/mysqli.php';

function listWeights($link)
{
    $sql = 'SELECT seasoning, tablespoon, teaspoon, cup FROM weights;';
    $results = mysqli_query($link, $sql);

    $weights = [];
    while($weight = mysqli_fetch_assoc($results)){
        $weights[] = $weight;
    }
    mysqli_free_result($results);
    return $weights;
}

$link = dbConnect();
$weights = listWeights($link);
mysqli_close($link);


// $title = '読書ログの一覧';
// $contents = __DIR__ . '/views/index.php';
include __DIR__ . '/views/index.php';
