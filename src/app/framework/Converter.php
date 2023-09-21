<?php

namespace app\framework;

interface Converter
{
    public function calcMainValue(): float;
    public function calcSubValue(): float;
}
