<?php

namespace CryptoMarkets\Binance;

use CryptoMarkets\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway;
        $this->gateway->setHttpClient($this->getHttpClient());
    }

    public function testSymbols()
    {
        $request = $this->gateway->symbols();

        $this->assertInstanceOf(Endpoints\Symbol::class, $request);
    }

    public function testTicker()
    {
        $request = $this->gateway->ticker('BTCUSDT');

        $this->assertInstanceOf(Endpoints\Ticker::class, $request);
    }

    public function testOrderBook()
    {
        $request = $this->gateway->orderBook('BTCUSDT');

        $this->assertInstanceOf(Endpoints\OrderBook::class, $request);
    }

    public function testTrades()
    {
        $request = $this->gateway->trades('BTCUSDT');

        $this->assertInstanceOf(Endpoints\Trade::class, $request);
    }

    public function testBalances()
    {
        $request = $this->gateway->balances([]);

        $this->assertInstanceOf(Endpoints\Balance::class, $request);
    }

    public function testBuy()
    {
        $request = $this->gateway->buy('BTCUSDT', '0.10', '1.0');

        $this->assertInstanceOf(Endpoints\Buy::class, $request);
    }

    public function testSell()
    {
        $request = $this->gateway->sell('BTCUSDT', '0.10', '1.0');

        $this->assertInstanceOf(Endpoints\Sell::class, $request);
    }

    public function testStatus()
    {
        $request = $this->gateway->status('BTCUSDT', 1);

        $this->assertInstanceOf(Endpoints\Status::class, $request);
    }

    public function testCancel()
    {
        $request = $this->gateway->cancel('BTCUSDT', 1);

        $this->assertInstanceOf(Endpoints\Cancel::class, $request);
    }

    public function testOpenOrders()
    {
        $request = $this->gateway->openOrders('BTCUSDT');

        $this->assertInstanceOf(Endpoints\OpenOrders::class, $request);
    }

    public function testTradeHistory()
    {
        $request = $this->gateway->tradeHistory('BTCUSDT');

        $this->assertInstanceOf(Endpoints\TradeHistory::class, $request);
    }
}
