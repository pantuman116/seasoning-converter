<?php

namespace app\unit\volume;

use app\framework\Unit;

interface Volume extends Unit
{
    public function getTableNotation(): string;
}
