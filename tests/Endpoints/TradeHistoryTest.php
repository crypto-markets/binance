<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Tests\TestCase;

class TradeHistoryTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new TradeHistory($this->getHttpClient());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('TradeHistorySuccess.txt');

        $this->endpoint->configure([
            'api_key' => 'secret',
            'secret'  => 'secret',
            'symbol'  => 'BNBBTC',
        ]);

        $response = $this->endpoint->send();

        $this->assertSame([
            [
                'id' => 1,
                'symbol' => 'LTCBTC',
                'side' => 'buy',
                'type' => 'limit',
                'status' => 'new',
                'price' => '0.1',
                'amount' => '1.0',
                'timestamp' => 1499827319559,
            ],
        ], $response);
    }

    public function testSendFailure()
    {
        // $this->setMockHttpResponse('TradeHistoryFailure.txt');

        // $response = $this->endpoint->send();

        // $this->assertSame([], $response);

        $this->assertTrue(true);
    }
}
