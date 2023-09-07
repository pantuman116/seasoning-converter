<?php

// require_once __DIR__ . '/../api/escape.php';
require_once __DIR__ . '/../api/mysqli.php';

/**
 * @return array<int<0, max>, array<string, string>> $weights
 */
function listWeights(object $link): array
{
    $sql = 'SELECT seasoning, tablespoon, teaspoon, cup FROM weights;';
    $results = mysqli_query($link, $sql);

    $weights = [];
    while ($weight = mysqli_fetch_assoc($results)) {
        $weights[] = $weight;
    }
    mysqli_free_result($results);
    return $weights;
}

$link = dbConnect();
$weights = listWeights($link);
mysqli_close($link);


// $title = '読書ログの一覧';
// $contents = __DIR__ . '/../views/pages/index.php';
include __DIR__ . '/../views/pages/index.php';
