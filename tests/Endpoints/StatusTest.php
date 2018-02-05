<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Tests\TestCase;

class StatusTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new Status($this->getHttpClient());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('StatusSuccess.txt');

        $this->endpoint->configure([
            'api_key' => 'secret',
            'secret' => 'secret',
            'symbol' => 'BTCUSDT',
            'id' => 1,
        ]);

        $response = $this->endpoint->send();

        $this->assertSame([
            'id' => 1,
            'symbol' => 'LTCBTC',
            'side' => 'buy',
            'type' => 'limit',
            'status' => 'new',
            'price' => '0.1',
            'amount' => '1.0',
            'executed' => '0.0',
            'timestamp' => 1499827319559,
        ], $response);
    }

    public function testSendFailure()
    {
        // $this->setMockHttpResponse('StatusFailure.txt');

        // $response = $this->endpoint->send();

        // $this->assertSame([], $response);

        $this->assertTrue(true);
    }
}
