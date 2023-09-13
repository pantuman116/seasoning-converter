<?php

namespace app;

class SubValue
{
    protected float $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function changeValue($value)
    {
        return new SubValue($value);
    }
}
