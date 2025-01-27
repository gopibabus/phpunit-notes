<?php

namespace App\Tests;

use App\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    protected Cart $cart;

    /**
     * Runs before each test
     * @return void
     */
    protected function setUp(): void
    {
        $this->cart = new Cart();
    }

    /**
     * Runs after each test
     * @return void
     */
    protected function tearDown(): void
    {
        Cart::setTax(1.2);
    }

    /**
     * Test 1
     * @return void
     */
    public function testTheCartTaxValueCanBeChangedStatically(): void
    {
        // Setup
        $this->cart->setPrice(10);

        // Do something
        Cart::setTax(1.5);
        $netPrice = $this->cart->getNetPrice();

        // Make assertions
        $this->assertEquals(15, $netPrice);
    }

    /**
     * Test 2
     * @return void
     */
    public function testNetPriceIsCalculatedCorrectly(): void
    {
        // Setup
        $this->cart->setPrice(10);

        // Do something
        $netPrice = $this->cart->getNetPrice();

        // Make assertions
        $this->assertEquals(12, $netPrice);
    }
}
