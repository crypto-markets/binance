<?php

namespace CryptoMarkets\Binance;

use CryptoMarkets\Common\Market;

class Binance extends Market
{
    /**
     * Get the default options.
     *
     * @return array
     */
    public function getDefaultOptions()
    {
        return [
            'api_key' => null,
            'secret'  => null,
        ];
    }

    /**
     * Get the market name.
     *
     * @return string
     */
    public function getName()
    {
        return 'Binance';
    }

    /**
     * {@inheritdoc}
     */
    public function symbols()
    {
        return Endpoints\Symbol::handle($this);
    }

    /**
     * {@inheritdoc}
     */
    public function ticker($symbol)
    {
        return Endpoints\Ticker::handle($this, compact(
            'symbol'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function orderBook($symbol, $limit = 50)
    {
        return Endpoints\OrderBook::handle($this, compact(
            'symbol', 'limit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function trades($symbol, $limit = 50)
    {
        return Endpoints\Trade::handle($this, compact(
            'symbol', 'limit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function balances()
    {
        return Endpoints\Balance::handle($this);
    }

    /**
     * {@inheritdoc}
     */
    public function buy($symbol, $amount, $price)
    {
        return Endpoints\Buy::handle($this, compact(
            'symbol', 'amount', 'price'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function sell($symbol, $amount, $price)
    {
        return Endpoints\Sell::handle($this, compact(
            'symbol', 'amount', 'price'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function status($symbol, $id)
    {
        return Endpoints\Status::handle($this, compact(
            'symbol', 'id'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function cancel($symbol, $id)
    {
        return Endpoints\Cancel::handle($this, compact(
            'symbol', 'id'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function openOrders($symbol = null)
    {
        return Endpoints\OpenOrders::handle($this, compact(
            'symbol'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function tradeHistory($symbol = null)
    {
        return Endpoints\TradeHistory::handle($this, compact(
            'symbol'
        ));
    }
}
