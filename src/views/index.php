<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8mb4">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- <link rel="stylesheet" href="stylesheets/css/app.css"> -->
    <title><?php echo '重量表一覧'; ?></title>
</head>

<body>
    <header class="navbar shadow-sm p-3 mb-5 bg-white">
        <h1 class="h2">
            <a class="text-body text-decoration-none" href="index.php">Seasoning Converter</a>
        </h1>
    </header>
    <div class="container">
        <button type="submit" class="btn btn-primary">単位変換へ</button>
    </div>
    <div class="container">
        <button type="submit" class="btn btn-primary">調味料新規追加</button>
    </div>
    <div class="container">
        <table>
            <caption>変換表</caption>
            <?php if (count($weights) > 0) : ?>
                <tr>
                    <th>調味料</th>
                    <th>大さじ1（15cc）</th>
                    <th>小さじ1（5cc）</th>
                    <th>カップ1（200cc）</th>
                </tr>
                <?php foreach ($weights as $weight) : ?>
                    <tr>
                        <th>
                            <?php echo $weight['seasoning'] ?>
                        </th>
                        <th>
                            <?php echo $weight['tablespoon'] . 'g' ?>
                        </th>
                        <th>
                            <?php echo $weight['teaspoon'] . 'g' ?>
                        </th>
                        <th>
                            <?php echo $weight['cup'] . 'g' ?>
                        </th>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <p>重量表が登録されていません。</p>
            <?php endif; ?>
        </table>
    </div>
</body>
