<script src="views/js/InputEvent.js" defer></script>
<div class="container mb-5">
    <div class="row">
        <div class="col text-right">
            <a href="app/controller/WeightTable.php" class="btn btn-primary">重量表一覧</a>
        </div>
    </div>
</div>
<div class="card">
    <h6 class="card-header">Seasoning Converter</h6>
    <div>
        <select class="form-select form-select-lg m-3" name="seasoning" id="seasoning">
            <?php foreach ($seasoningList as $seasoning) : ?>
                <option value=<?php echo $seasoning; ?>><?php echo $seasoning; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <div class="card ml-3">
                <div class="ml-3 mt-3">
                    <input type="number" placeholder="数値を入力" id="mainValue">
                </div>
                <div class="ml-3 mb-3">
                    <select name="mainUnit" id="mainUnit">
                        <?php foreach ($mainUnitList as $mainUnit) : ?>
                            <option value=<?php echo $mainUnit; ?>><?php echo $mainUnit; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-2 text-center text-large">
            <h3>=</h3>
        </div>
        <div class="col-sm-5">
            <div class="card mr-3">
                <div class="mr-3 mt-3">
                    <input type="number" placeholder="数値を入力" id="subValue">
                </div>
                <div class="mr-3 mb-3">
                    <select name="subUnit" id="subUnit">
                        <?php foreach ($subUnitList as $subUnit) : ?>
                            <option value=<?php echo $subUnit; ?>><?php echo $subUnit; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
