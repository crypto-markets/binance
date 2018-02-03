<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Tests\TestCase;

class SymbolTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new Symbol($this->getHttpClient());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('SymbolSuccess.txt');

        $response = $this->endpoint->send();

        $this->assertSame([
            ['symbol' => 'ETHBTC', 'base' => 'ETH', 'quote' => 'BTC'],
        ], $response);
    }
}
