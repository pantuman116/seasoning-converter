<?php

use PHPUnit\Framework\TestCase;

class TestSampleTest extends TestCase
{
    function testDouble()
    {
        require_once __DIR__ . '/../app/testsample.php';
        $this->assertSame(4, double(2));
    }
}
