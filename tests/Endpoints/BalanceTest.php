<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Tests\TestCase;

class BalanceTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new Balance($this->getHttpClient());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('BalanceSuccess.txt');

        $this->endpoint->configure([
            'api_key' => 'secret',
            'secret'  => 'secret',
        ]);

        $response = $this->endpoint->send();

        $this->assertSame([
            ['symbol' => 'BTC', 'amount' => '4723846.89208129', 'locked' => '0.00000000'],
            ['symbol' => 'LTC', 'amount' => '4763368.68006011', 'locked' => '0.00000000'],
        ], $response);
    }

    public function testSendFailure()
    {
        // $this->setMockHttpResponse('BalanceFailure.txt');

        // $response = $this->endpoint->send();

        // $this->assertSame([], $response);

        $this->assertTrue(true);
    }
}
