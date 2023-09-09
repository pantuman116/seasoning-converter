<div class="container mb-5">
    <div class="row">
        <div class="col text-right">
            <a href="weights.php" class="btn btn-primary">重量表一覧</a>
        </div>
    </div>
</div>
<div class="border">
    <select name="pets" id="pet-select">
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="hamster">Hamster</option>
        <option value="parrot">Parrot</option>
        <option value="spider">Spider</option>
        <option value="goldfish">Goldfish</option>
    </select>
    <div>
        <input type="number" placeholder="数値を入力">
        <select name="pets" id="pet-select">
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="hamster">Hamster</option>
            <option value="parrot">Parrot</option>
            <option value="spider">Spider</option>
            <option value="goldfish">Goldfish</option>
        </select>
    </div>
    <div>=</div>
    <div>
        <input type="number" placeholder="数値を入力">
        <select name="pets" id="pet-select">
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="hamster">Hamster</option>
            <option value="parrot">Parrot</option>
            <option value="spider">Spider</option>
            <option value="goldfish">Goldfish</option>
        </select>
    </div>
    <form method="post">
        <input type="submit" name="volume_button" value="体積→重量"/>
    </form>
    <form method="post">
        <input type="submit" name="weight_button" value="重量→体積"/>
    </form>
</div>
