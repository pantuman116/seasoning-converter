<?php

require __DIR__ . '/../vendor/autoload.php';

function insertDefaultTable($link): void
{

    $default_table = [
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

    foreach ($default_table as $columns) {
        $insert_table_sql = <<<EOT
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
        $result = mysqli_query($link, $insert_table_sql);
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
    $drop_table_sql = 'DROP TABLE IF EXISTS weights;';
    $result = mysqli_query($link, $drop_table_sql);
    if ($result) {
        echo '重量表テーブルを削除できました' . PHP_EOL;
    } else {
        echo '重量表テーブルを削除できませんでした' . PHP_EOL;
        echo 'Debugging Error' . mysqli_error($link) . PHP_EOL;
    }
}

function dbConnect(): object
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();

    $db_host = $_ENV['DB_HOST'];
    $db_username = $_ENV['DB_USERNAME'];
    $db_password = $_ENV['DB_PASSWORD'];
    $db_database = $_ENV['DB_DATABASE'];

    $link =  mysqli_connect($db_host, $db_username, $db_password, $db_database);

    if (!$link) {
        echo 'データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging Error' . mysqli_connect_error() . PHP_EOL;
    }
    return $link;
}

$link = dbConnect();
dropTable($link);
createTable($link);
insertDefaultTable($link);
mysqli_close($link);
