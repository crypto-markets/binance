<?php

namespace CryptoMarkets\Tests\Binance;

use Mockery as m;
use CryptoMarkets\Exchange;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected $market;

    public function setUp()
    {
        parent::setup();

        $this->market = new Exchange('Binance', [
            'api_key' => 'foo',
            'secret' => 'bar',
            'client' => m::mock('StdClass'),
        ]);
    }

    public function tearDown()
    {
        m::close();
    }
}
