<?php

namespace App\Tests;

require 'example-functions.php';
use App\Cart;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testThatTwoStringsAreSame()
    {
        $this->assertSame('foo', 'foo');
        $this->assertTrue('foo' === 'foo');
    }

    #[DataProvider('quotientProvider')]
    public function testQuotientIsCalculatedCorrectly($a, $b, $expected)
    {
        $quotient = quotient($a, $b);

        $this->assertSame($expected, $quotient);
    }


    /**
     * If you give each array a key name, it makes it easy to identify which scenarios have failed
     */
    public static function quotientProvider(): array
    {
        return [
            '9_by_3' => [9, 3, 3],
            '72_by_9' => [72, 9, 8],
            'division_by_zero' => [20, 0, 20],
        ];
    }

    public function testSomeAssertions(): void
    {
        // assertArrayHasKey
        $testArray = ['foo' => 'bar'];
        $this->assertArrayHasKey('foo', $testArray);

        $this->assertArrayNotHasKey('zoo', $testArray);

        // assertContains
        $this->assertContains('bar', $testArray);

        $this->assertNotContains('baz', $testArray);

        // assertStringContainsString
        $string = json_encode([
            'price' => '8.99',
            'date'  => '2021-12-04',
        ]);

        $this->assertStringContainsString('"date":"2021-12-04"', $string);

        // assertInstanceOf
        $cart = new Cart();
        $this->assertInstanceOf(Cart::class, $cart);

        // assertCount
        $this->assertCount(5, [1, 2, 3, 4, 5]);

        // assertEquals / assertSame
        $value = 21;
        $this->assertEquals('21', $value);

        // assertGreaterThan (or equal)
        $this->assertGreaterThanOrEqual(21, $value);

        // assertIsArray with custom failure message
        $this->assertTrue(is_array([3, 2, 1]), 'Asserting this [3, 2, 1] is an array');

        // Using constants from bootstrap.php
        $this->assertEquals('localhost', URL);
    }
}
