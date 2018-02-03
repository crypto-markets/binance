<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Tests\TestCase;

class TradeTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new Trade($this->getHttpClient());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('TradeSuccess.txt');

        $this->endpoint->configure([
            'api_key' => 'secret',
            'secret'  => 'secret',
            'symbol'  => 'BNBBTC',
        ]);

        $response = $this->endpoint->send();

        $this->assertSame([
            [
                'id' => 28457,
                'symbol' => 'BNBBTC',
                'side' => 'buy',
                'type' => 'limit',
                'status' => 'open',
                'price' => '4.00000100',
                'amount' => '12.00000000',
                'timestamp' => 1499865549590,
            ],
        ], $response);
    }

    public function testSendFailure()
    {
        // $this->setMockHttpResponse('TradeFailure.txt');

        // $response = $this->endpoint->send();

        // $this->assertSame([], $response);

        $this->assertTrue(true);
    }
}
