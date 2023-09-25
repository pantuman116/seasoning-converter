<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8mb4">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/views/stylesheets/css/app.css">
    <title><?php echo $title; ?></title>
</head>

<body>
    <header class="navbar shadow-sm p-3 mb-5 bg-white">
        <h1 class="h2">
            <a class="text-body text-decoration-none" href="/">Seasoning Converter</a>
        </h1>
    </header>
    <div class="container">
        <?php include $contents; ?>
    </div>
</body>
