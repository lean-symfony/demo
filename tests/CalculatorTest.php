<?php

namespace App\Tests;

use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @var Calculator */
    private $calc;

    protected function setUp()
    {
        $this->calc = new Calculator();
    }


    public function testAdd()
    {
        $this->assertEquals(21, $this->calc->add(17,4));
    }

    public function testSub()
    {
        $this->assertEquals(13, $this->calc->sub(17,4));
    }
}
