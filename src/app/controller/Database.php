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

    public function getWeightTableSpoon()
    {
        $weights = listWeights($this->link);
        return array_column($weights, 'tablespoon', 'seasoning');
    }
}
