<?php

namespace app\controller;

require_once __DIR__ . '/../../database/mysqli.php';

class Database
{
    protected $link;

    function __construct()
    {
        $this->link = dbConnect();
    }

    function __destruct() {
        dbClose($this->link);
    }

    public function getWeights()
    {
        $weights = listWeights($this->link);
        array_multisort(array_column($weights, 'reading'), SORT_ASC, $weights);
        return $weights;
    }

    public function getWeightTableSpoon()
    {
        $weights = $this->getWeights();
        return array_column($weights, 'tablespoon', 'seasoning');
    }

    public function getSeasoningList()
    {
        $weights = $this->getWeights();
        return array_column($weights, 'seasoning');
    }
}
