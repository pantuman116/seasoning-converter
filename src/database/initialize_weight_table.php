<?php

require 'mysqli.php';

function insertDefaultTable(mysqli $link): void
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
            'cup' => 230,
        ],
        [
            'seasoning' => 'はちみつ',
            'reading' => 'はちみつ',
            'tablespoon' => 21,
            'teaspoon' => 7,
            'cup' => 280,
        ],
        [
            'seasoning' => '小麦粉',
            'reading' => 'こむぎこ',
            'tablespoon' => 9,
            'teaspoon' => 3,
            'cup' => 110,
        ],
        [
            'seasoning' => 'パン粉',
            'reading' => 'ぱんこ',
            'tablespoon' => 3,
            'teaspoon' => 1,
            'cup' => 40,
        ],
        [
            'seasoning' => 'オートミール',
            'reading' => 'おーとみーる',
            'tablespoon' => 6,
            'teaspoon' => 2,
            'cup' => 80,
        ],
        [
            'seasoning' => '片栗粉',
            'reading' => 'かたくりこ',
            'tablespoon' => 9,
            'teaspoon' => 3,
            'cup' => 130,
        ],
        [
            'seasoning' => '上白糖',
            'reading' => 'じょうはくとう',
            'tablespoon' => 9,
            'teaspoon' => 3,
            'cup' => 130,
        ],
        [
            'seasoning' => 'グラニュー糖',
            'reading' => 'ぐらにゅーとう',
            'tablespoon' => 12,
            'teaspoon' => 4,
            'cup' => 180,
        ],
        [
            'seasoning' => 'レモン汁',
            'reading' => 'れもんじる',
            'tablespoon' => 15,
            'teaspoon' => 5,
            'cup' => 200,
        ],
        [
            'seasoning' => '牛乳',
            'reading' => 'ぎゅうにゅう',
            'tablespoon' => 15,
            'teaspoon' => 5,
            'cup' => 206,
        ],
        [
            'seasoning' => 'クリームチーズ',
            'reading' => 'くりーむちーず',
            'tablespoon' => 15,
            'teaspoon' => 5,
            'cup' => 230,
        ],
        [
            'seasoning' => 'オリーブオイル',
            'reading' => 'おりーぶおいる',
            'tablespoon' => 12,
            'teaspoon' => 4,
            'cup' => 180,
        ],
        [
            'seasoning' => 'ごま油',
            'reading' => 'ごまあぶら',
            'tablespoon' => 12,
            'teaspoon' => 4,
            'cup' => 180,
        ],
        [
            'seasoning' => 'バター',
            'reading' => 'ばたー',
            'tablespoon' => 12,
            'teaspoon' => 4,
            'cup' => 180,
        ],
        [
            'seasoning' => '料理酒',
            'reading' => 'りょうりしゅ',
            'tablespoon' => 15,
            'teaspoon' => 5,
            'cup' => 200,
        ],
        [
            'seasoning' => 'ウスターソース',
            'reading' => 'うすたーそーす',
            'tablespoon' => 17,
            'teaspoon' => 6,
            'cup' => 240,
        ],
        [
            'seasoning' => '食塩',
            'reading' => 'しょくえん',
            'tablespoon' => 18,
            'teaspoon' => 6,
            'cup' => 240,
        ],
        [
            'seasoning' => '粗塩',
            'reading' => 'あらじお',
            'tablespoon' => 15,
            'teaspoon' => 5,
            'cup' => 180,
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
            continue;
        }
        echo 'テーブルを挿入できませんでした' . PHP_EOL;
        echo 'Debugging Error' . mysqli_error($link) . PHP_EOL;
    }
}

function createTable(mysqli $link): void
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
        return;
    }
    echo 'テーブルを作成できませんでした' . PHP_EOL;
    echo 'Debugging Error:' . mysqli_error($link) . PHP_EOL;
}

function dropTable(mysqli $link): void
{
    $dropTableSql = 'DROP TABLE IF EXISTS weights;';
    $result = mysqli_query($link, $dropTableSql);
    if ($result) {
        echo '重量表テーブルを削除できました' . PHP_EOL;
        return;
    }
    echo '重量表テーブルを削除できませんでした' . PHP_EOL;
    echo 'Debugging Error' . mysqli_error($link) . PHP_EOL;
}

$link = dbConnect();
dropTable($link);
createTable($link);
insertDefaultTable($link);
mysqli_close($link);
