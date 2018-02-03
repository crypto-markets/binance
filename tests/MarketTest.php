<?php

namespace CryptoMarkets\Tests\Binance;

class MarketTest extends TestCase
{
    public function testName()
    {
        $this->assertEquals('Binance', $this->market->getName());
    }
}
