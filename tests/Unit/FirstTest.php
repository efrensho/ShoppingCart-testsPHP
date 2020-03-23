<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use App\Calculator;

class FirstTest extends TestCase
{
    public function testSum()
    {
        $c = new Calculator();

        //Llamar Assert con this
        $this->assertEquals(5, $c->sum(2,3));
        $this->assertInstanceOf(Calculator::class, $c);
    }

    public function testAsserts()
    {
        // Llamar Assert forma estática
        self::assertFalse(false);

        $this->assertClassHasAttribute('data', Calculator::class);

        $this->assertContains(1, [3,4,5,1]);

        $this->assertIsFloat(2.0);

        $this->assertIsString("This is true");
    }
}