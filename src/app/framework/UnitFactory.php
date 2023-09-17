<?php

namespace app\framework;

interface UnitFactory
{
    public function getUnit(string $unitName);
    public function getUnitList();
}
