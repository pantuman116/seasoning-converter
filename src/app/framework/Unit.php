<?php

namespace app\framework;

interface Unit
{
    public function getName(): string;
    public function getBaseUnitValue(): float;
    public function getBaseUnitCoefficient(): float;
    public function changeValue(float $value): object;
}
