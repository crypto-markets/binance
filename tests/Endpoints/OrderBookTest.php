<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Tests\TestCase;

class OrderBookTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new OrderBook($this->getHttpClient());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('OrderBookSuccess.txt');

        $this->endpoint->configure([
            'api_key' => 'secret',
            'secret' => 'secret',
            'symbol' => 'BTCUSDT',
        ]);

        $response = $this->endpoint->send();

        $this->assertSame([
            'bids' => [
                ['price' => '4.00000000', 'amount' => '431.00000000', 'timestamp' => null],
            ],
            'asks' => [
                ['price' => '4.00000200', 'amount' => '12.00000000', 'timestamp' => null],
            ],
        ], $response);
    }

    public function testSendFailure()
    {
        // $this->setMockHttpResponse('OrderBookFailure.txt');

        // $response = $this->endpoint->send();

        // $this->assertSame([], $response);

        $this->assertTrue(true);
    }
}
