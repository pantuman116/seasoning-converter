<div class="container mb-5">
    <div class="row">
        <div class="col text-left">
            <a href="index.php" class="btn btn-primary">単位変換</a>
        </div>
        <div class="col text-right">
            <a href="" class="btn btn-primary">新規追加</a>
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
