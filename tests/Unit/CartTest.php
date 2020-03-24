<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use App\ShoppingCart\Cart;
use App\ShoppingCart\CartItem;
use App\Connection;


/**
 * @testdox Shopping Cart V2
 */
class CartTest extends TestCase
{

    protected function setUp(): void
    {
        $this->cart = new Cart();

        $this->conn = new Connection();

        $this->conn->createSchema();
    }

    protected function tearDown(): void
    {
        $this->conn->dropTable();
    }

    public function testItCreatesACart()
    {
        $item = createItem("Mouse",20); //new CartItem("Mouse", 20);
    
        $this->assertEquals(0, $this->cart->count());

        $this->cart->add($item);

        $this->assertEquals(1, $this->cart->count());
    }

    public function testItAddsMultiplesItems()
    {
        $items = [];
        //$item = new CartItem("Mouse", 20);
        $cart = new Cart();
    
        $this->assertEquals(0, $cart->count());

        for($i = 1; $i <=5; $i++)
        {
            array_push($items, new CartItem("Mouse", 20));
        }

        $cart->addItems($items);

        $this->assertEquals(count($items), $cart->count());
    }

    public function testIsEmpty()
    {
        $cart = new Cart();

        $this->assertTrue($cart->IsEmpty());
    }

    public function testItRemovesAnItem()
    {
        $item = new CartItem("Mouse", 20);
        $cart = new Cart();

        $cart->add($item);

        $this->assertEquals(1, $cart->count());

        $cart->remove($item->id);

        $this->assertTrue($cart->IsEmpty());
    }


    /**
     * @doesNotPerformAssertions
     */
    public function testItStoresAnCart()
    {
        $this->MarkTestIncomplete();


        $this->conn->insert($this->cart);
        $cart = $this->conn->get($this->cart->id);
        $this->assertEquals($cart->id, $this->cart->id);
    }

}