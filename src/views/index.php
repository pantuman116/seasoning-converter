<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8mb4">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="stylesheets/css/app.css">
    <title><?php echo '重量表一覧'; ?></title>
</head>

<body>
    <header class="navbar shadow-sm p-3 mb-5 bg-white">
        <h1 class="h2">
            <a class="text-body text-decoration-none" href="index.php">Seasoning Converter</a>
        </h1>
    </header>
    <div class="container mb-5">
        <div class="row">
            <div class="col text-left">
                <button type="submit" class="btn btn-primary">単位変換</button>
            </div>
            <div class="col text-right">
                <button type="submit" class="btn btn-primary">新規追加</button>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped">
            <?php if (count($weights) > 0) : ?>
                <thead>
                    <tr>
                        <th scope="col">調味料</th>
                        <th scope="col">大さじ1（15cc）</th>
                        <th scope="col">小さじ1（5cc）</th>
                        <th scope="col">カップ1（200cc）</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($weights as $weight) : ?>
                    <tr>
                        <th scope="row">
                            <?php echo $weight['seasoning'] ?>
                        </th>
                        <td>
                            <?php echo $weight['tablespoon'] . 'g' ?>
                        </td>
                        <td>
                            <?php echo $weight['teaspoon'] . 'g' ?>
                        </td>
                        <td>
                            <?php echo $weight['cup'] . 'g' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            <?php else : ?>
                <p>重量表が登録されていません。</p>
            <?php endif; ?>
        </table>
    </div>
</body>
