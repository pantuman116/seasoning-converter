<?php

namespace app\framework;

interface Unit
{
    public function getName();
    public function getBaseUnitValue();
    public function getBaseUnitCoefficient();
    public function changeValue(float $value);
}
