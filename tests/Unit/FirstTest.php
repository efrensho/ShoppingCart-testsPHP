<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use App\Calculator;

class FirstTest extends TestCase
{


    public static function setUpBeforeClass(): void
    {
        echo "Inicio\n";
    }

    public static function tearDownAfterClass(): void
    {
        echo "Fin\n";
    }
    
    protected function setUp(): void
    {
    }
    
    protected function tearDown(): void
    {
        echo "Teardown\n";
    }



    //Se definen las anotaciones en los comentarios como sigue
    // Con la anotación @test no es necesario que los métodos digan test en su declaración 

    /**
     * @test
     */
    public function Sum()
    {
        $c = new Calculator();

        //Llamar Assert con this
        $this->assertEquals(5, $c->sum(2,3));
        $this->assertInstanceOf(Calculator::class, $c);
    }


    /**
     * @testdox It executes Asserts
     */
    public function testAsserts()
    {
        // Llamar Assert forma estática
        self::assertFalse(false);

        $this->assertClassHasAttribute('data', Calculator::class);

        $this->assertContains(1, [3,4,5,1]);

        $this->assertIsFloat(2.0);

        $this->assertIsString("This is true");
    }

    /**
     * @doesNotPerformAssertions
     */
    public function Empty()
    {
        
    }



    /**
     * @doesNotPerformAssertions
     */
    public function testIncomplete()
    {
        //$this->MarkTestIncomplete();
    }



     /**
     * @doesNotPerformAssertions
     */
    public function testIgnore()
    {
        //$this->MarkTestSkipped();
    }
}