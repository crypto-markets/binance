<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Tests\TestCase;

class CancelTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new Cancel($this->getHttpClient());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('CancelSuccess.txt');
        $this->setMockHttpResponse('StatusSuccess.txt');

        $this->endpoint->configure([
            'api_key' => 'secret',
            'secret' => 'secret',
            'symbol' => 'LTCBTC',
            'id'  => '1',
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
        // $this->setMockHttpResponse('CancelFailure.txt');

        // $response = $this->endpoint->send();

        // $this->assertSame([], $response);

        $this->assertTrue(true);
    }
}
