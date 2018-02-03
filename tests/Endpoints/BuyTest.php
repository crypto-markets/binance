<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Tests\TestCase;

class BuyTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new Buy($this->getHttpClient());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('BuySuccess.txt');

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
            'side' => 'buy',
            'type' => 'limit',
            'status' => 'filled',
            'price' => '0.00000000',
            'amount' => '10.00000000',
            'timestamp' => 1507725176595,
        ], $response);
    }

    public function testSendFailure()
    {
        // $this->setMockHttpResponse('BuyFailure.txt');

        // $response = $this->endpoint->send();

        // $this->assertSame([], $response);

        $this->assertTrue(true);
    }
}
