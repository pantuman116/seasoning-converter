<?php

namespace app\framework;

interface UnitFactory
{
    public function getUnit(string $unitName): object;

    /**
     * @return array<string>
     */
    public function getUnitList(): array;
}
