<?php

namespace app\controller;

use mysqli;

require_once __DIR__ . '/../../database/mysqli.php';

class Database
{
    protected mysqli $link;

    public function __construct()
    {
        $this->link = dbConnect();
    }

    public function __destruct()
    {
        dbClose($this->link);
    }

    /**
     * @return array<int, array<string,string>>
     */
    public function getWeights(): array
    {
        $weights = listWeights($this->link);
        //ふりがな(reading)で昇順に並び替え
        $weightsSelectedRows = array_column($weights, 'reading');
        array_multisort($weightsSelectedRows, SORT_ASC, $weights);

        return $weights;
    }

    /**
     * @return array<string, string>
     */
    public function getWeightTableSpoon(): array
    {
        $weights = $this->getWeights();
        return array_column($weights, 'tablespoon', 'seasoning');
    }

    /**
     * @return array<string>
     */
    public function getSeasoningList(): array
    {
        $weights = $this->getWeights();
        return array_column($weights, 'seasoning');
    }
}
