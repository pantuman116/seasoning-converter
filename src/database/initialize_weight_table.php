<?php

require 'mysqli.php';

function insertDefaultTable($link): void
{

    $defaultTable = [
        [
            'seasoning' => '水',
            'reading' => 'みず',
            'tablespoon' => 15,
            'teaspoon' => 5,
            'cup' => 200,
        ],
        [
            'seasoning' => '醤油',
            'reading' => 'しょうゆ',
            'tablespoon' => 18,
            'teaspoon' => 6,
            'cup' => 240,
        ],
        [
            'seasoning' => 'はちみつ',
            'reading' => 'はちみつ',
            'tablespoon' => 21,
            'teaspoon' => 7,
            'cup' => 280,
        ],
    ];

    foreach ($defaultTable as $columns) {
        $insertTableSql = <<<EOT
        INSERT INTO weights (
            seasoning,
            reading,
            tablespoon,
            teaspoon,
            cup
        ) VALUES (
            "{$columns['seasoning']}",
            "{$columns['reading']}",
            "{$columns['tablespoon']}",
            "{$columns['teaspoon']}",
            "{$columns['cup']}"
        );
        EOT;
        $result = mysqli_query($link, $insertTableSql);
        if ($result) {
            echo 'テーブルを挿入できました' . PHP_EOL;
        } else {
            echo 'テーブルを挿入できませんでした' . PHP_EOL;
            echo 'Debugging Error' . mysqli_error($link) . PHP_EOL;
        }
    }
}

function createTable($link): void
{
    $createTableSql = <<<EOT
        CREATE TABLE weights (
            id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            seasoning VARCHAR(255),
            reading VARCHAR(255),
            tablespoon INTEGER,
            teaspoon INTEGER,
            cup INTEGER,
            create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) DEFAULT CHARACTER SET = utf8mb4;
        EOT;

    $result = mysqli_query($link, $createTableSql);
    if ($result) {
        echo 'テーブルを作成できました' . PHP_EOL;
    } else {
        echo 'テーブルを作成できませんでした' . PHP_EOL;
        echo 'Debugging Error:' . mysqli_error($link) . PHP_EOL;
    }
}

function dropTable($link): void
{
    $dropTableSql = 'DROP TABLE IF EXISTS weights;';
    $result = mysqli_query($link, $dropTableSql);
    if ($result) {
        echo '重量表テーブルを削除できました' . PHP_EOL;
    } else {
        echo '重量表テーブルを削除できませんでした' . PHP_EOL;
        echo 'Debugging Error' . mysqli_error($link) . PHP_EOL;
    }
}

$link = dbConnect();
dropTable($link);
createTable($link);
insertDefaultTable($link);
mysqli_close($link);
