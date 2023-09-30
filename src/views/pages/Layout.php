<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8mb4">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/views/stylesheets/css/app.css">
    <title><?php echo $title; ?></title>
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-95Q1P53EVE"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-95Q1P53EVE');
</script>

<body>
    <header class="navbar shadow-sm p-3 mb-5 bg-white">
        <div class="container">
            <a class="h3 text-body text-decoration-none" href="/">Seasoning Converter</a>
        </div>
        <div class="container">
            <a class="h6 text-body text-decoration-none" href="/">〜調味料別体積重量変換器〜</a>
        </div>
    </header>
    <div class="container">
        <?php include $contents; ?>
    </div>
</body>
