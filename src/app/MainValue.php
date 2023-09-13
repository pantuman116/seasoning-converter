<?php

namespace app;

class MainValue
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
        return new MainValue($value);
    }
}
