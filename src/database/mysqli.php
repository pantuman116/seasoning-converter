<?php

require __DIR__ . '/../vendor/autoload.php';

function dbConnect(): object
{
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..');
    $dotenv->load();

    $dbHost = getenv('DB_HOST');
    $dbUsername = getenv('DB_USERNAME');
    $dbPassword = getenv('DB_PASSWORD');
    $dbDatabase = getenv('DB_DATABASE');

    $link =  mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);

    if (!$link) {
        echo 'データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging Error' . mysqli_connect_error() . PHP_EOL;
    }
    return $link;
}

/**
 * @return array<int<0, max>, array<string, string>> $weights
 */
function listWeights(object $link): array
{
    $sql = 'SELECT seasoning, reading, tablespoon, teaspoon, cup FROM weights;';
    $results = mysqli_query($link, $sql);

    $weights = [];
    while ($weight = mysqli_fetch_assoc($results)) {
        $weights[] = $weight;
    }
    mysqli_free_result($results);
    return $weights;
}

function dbClose($link)
{
    mysqli_close($link);
}
