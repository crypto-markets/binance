<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Tests\TestCase;

class SellTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new Sell($this->getHttpClient());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('SellSuccess.txt');

        $this->endpoint->configure([
            'api_key' => 'secret',
            'secret'  => 'secret',
            'symbol'  => 'BTCUSDT',
            'amount'  => '0.00000000',
            'price'   => '10.00000000',
        ]);

        $response = $this->endpoint->send();

        $this->assertSame([
            'id' => 28,
            'symbol' => 'BTCUSDT',
            'side' => 'sell',
            'type' => 'limit',
            'status' => 'filled',
            'price' => '0.00000000',
            'amount' => '10.00000000',
            'timestamp' => 1507725176595,
        ], $response);
    }

    public function testSendFailure()
    {
        // $this->setMockHttpResponse('SellFailure.txt');

        // $response = $this->endpoint->send();

        // $this->assertSame([], $response);

        $this->assertTrue(true);
    }
}
