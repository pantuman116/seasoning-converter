<?php

namespace app\converter;

use app\converter\VolumeWeightCoefficient;
use app\controller\Database;
use app\unit\volume\Volume;

class VolumeWeightCoefficientSeasoning implements VolumeWeightCoefficient
{
    protected float $value;
    protected const DEFAULT_VOLUME_UNIT = 'tablespoon';

    public function __construct(string $seasoning, Volume $volumeUnit)
    {
        $dbObj = new Database();
        $weights = $dbObj->getWeights();
        //UnitTableに応じた変換係数を算出
        $volumeUnitTable = $this->getVolumeUnitTable($weights, $volumeUnit);
        $this->value = (float)$volumeUnitTable[$seasoning] / (float)$volumeUnitTable['水'];
    }

    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param array<int, array<string,string>> $weights
     * @return array<string>
     */
    protected function getVolumeUnitTable(array $weights, Volume $volumeUnit): array
    {
        $volumeUnitTable = $volumeUnit->getTableNotation();
        //テーブル表記が存在しない場合は、DEFAULT_VOLUME_UNITを代用
        if (!array_key_exists($volumeUnitTable, $weights[0])) {
            $volumeUnitTable = self::DEFAULT_VOLUME_UNIT;
        }
        return array_column($weights, $volumeUnitTable, 'seasoning');
    }
}
