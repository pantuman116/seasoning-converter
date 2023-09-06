<?php

require __DIR__ . '/../lib/mysqli.php';

function insertDefaultTable($link): void
{

    $defaultTable = [
        'water' => [
            'seasoning' => '水',
            'tablespoon' => 15,
            'teaspoon' => 5,
            'cup' => 200,
        ],
        'soisource' => [
            'seasoning' => '醤油',
            'tablespoon' => 18,
            'teaspoon' => 6,
            'cup' => 240,
        ],
        'hunney' => [
            'seasoning' => 'はちみつ',
            'tablespoon' => 21,
            'teaspoon' => 7,
            'cup' => 280,
        ],
    ];

    foreach ($defaultTable as $columns) {
        $insertTableSql = <<<EOT
        INSERT INTO weights (
            seasoning,
            tablespoon,
            teaspoon,
            cup
        ) VALUES (
            "{$columns['seasoning']}",
            "{$columns['tablespoon']}",
            "{$columns['teaspoon']}",
            "{$columns['cup']}"
        );
        EOT;
        $result = mysqli_query($link, $insertTableSql);
        if ($result) {
            echo 'テーブルを挿入できました' . PHP_EOL;
        }
        echo 'テーブルを挿入できませんでした' . PHP_EOL;
        echo 'Debugging Error' . mysqli_error($link) . PHP_EOL;
    }
}

function createTable($link): void
{
    $createTableSql = <<<EOT
        CREATE TABLE weights (
            id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            seasoning VARCHAR(255),
            tablespoon INTEGER,
            teaspoon INTEGER,
            cup INTEGER,
            create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) DEFAULT CHARACTER SET = utf8mb4;
        EOT;

    $result = mysqli_query($link, $createTableSql);
    if ($result) {
        echo 'テーブルを作成できました' . PHP_EOL;
    }
    echo 'テーブルを作成できませんでした' . PHP_EOL;
    echo 'Debugging Error:' . mysqli_error($link) . PHP_EOL;
}

function dropTable($link): void
{
    $dropTableSql = 'DROP TABLE IF EXISTS weights;';
    $result = mysqli_query($link, $dropTableSql);
    if ($result) {
        echo '重量表テーブルを削除できました' . PHP_EOL;
    }
    echo '重量表テーブルを削除できませんでした' . PHP_EOL;
    echo 'Debugging Error' . mysqli_error($link) . PHP_EOL;
}

$link = dbConnect();
dropTable($link);
createTable($link);
insertDefaultTable($link);
mysqli_close($link);
