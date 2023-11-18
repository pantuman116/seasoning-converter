<script src="views/js/InputEvent.js" defer></script>
<div class="container mb-5">
    <div class="row">
        <div class="col text-right">
            <a href="app/controller/WeightTable.php" class="btn btn-primary">重量表一覧</a>
        </div>
    </div>
</div>
<div class="card shadow-sm">
    <h6 class="card-header">Seasoning Converter</h6>
    <div class="input-group">
        <select class="custom-select m-3" name="seasoning" id="seasoning">
            <?php foreach ($seasoningList as $seasoning) : ?>
                <option value=<?php echo $seasoning; ?>><?php echo $seasoning; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="input-group">
                <input type="text" class="form-control ml-3 mt-3" placeholder="数値を入力" id="mainValue">
            </div>
            <div class="input-group">
                <select class="custom-select bg-light ml-3 mb-3" name="mainUnit" id="mainUnit">
                    <?php foreach ($mainUnitList as $mainUnit) : ?>
                        <option value=<?php echo $mainUnit; ?>><?php echo $mainUnit; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-2">
            <p class="mt-3 h4 text-center">=</p>
        </div>
        <div class="col-5">
            <div class="input-group">
                <input type="text" class="form-control  mr-3 mt-3" placeholder="数値を入力" id="subValue">
            </div>
            <div class="input-group">
                <select class="custom-select bg-light mr-3 mb-3" name="subUnit" id="subUnit">
                    <?php foreach ($subUnitList as $subUnit) : ?>
                        <option value=<?php echo $subUnit; ?>><?php echo $subUnit; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
</div>
