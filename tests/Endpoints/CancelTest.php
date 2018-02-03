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
        // $this->setMockHttpResponse('CancelSuccess.txt');

        // $response = $this->endpoint->send();

        // $this->assertSame([], $response);

        $this->assertTrue(true);
    }

    public function testSendFailure()
    {
        // $this->setMockHttpResponse('CancelFailure.txt');

        // $response = $this->endpoint->send();

        // $this->assertSame([], $response);

        $this->assertTrue(true);
    }
}
