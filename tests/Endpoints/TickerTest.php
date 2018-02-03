<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Tests\TestCase;

class TickerTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new Ticker($this->getHttpClient());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('TickerSuccess.txt');

        $this->endpoint->configure([
            'api_key' => 'secret',
            'secret'  => 'secret',
            'symbol'  => 'BNBBTC',
        ]);

        $response = $this->endpoint->send();

        $this->assertSame([
           'low' => '0.10000000',
           'high' => '100.00000000',
           'last' => '4.00000200',
           'volume' => '8913.30000000',
           'open' => '99.00000000',
           'bid' => '4.00000000',
           'ask' => '4.00000200',
           'average' => '0.29628482',
           'timestamp' => 1499869899040,
        ], $response);
    }

    public function testSendFailure()
    {
        // $this->setMockHttpResponse('TickerFailure.txt');

        // $this->endpoint->configure([
        //     'api_key' => 'secret',
        //     'secret'  => 'secret',
        //     'symbol'  => 'BNBTRX',
        // ]);

        // $response = $this->endpoint->send();

        $this->assertTrue(true);
    }
}
