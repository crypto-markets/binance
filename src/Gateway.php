<?php

namespace CryptoMarkets\Binance;

use CryptoMarkets\Common\Gateway as BaseGateway;

class Gateway extends BaseGateway
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
     * Get the gateway name.
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
        return $this->createRequest(Endpoints\Symbol::class);
    }

    /**
     * {@inheritdoc}
     */
    public function ticker($symbol)
    {
        return $this->createRequest(Endpoints\Ticker::class, compact(
            'symbol'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function orderBook($symbol, $limit = 50)
    {
        return $this->createRequest(Endpoints\OrderBook::class, compact(
            'symbol', 'limit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function trades($symbol, $limit = 50)
    {
        return $this->createRequest(Endpoints\Trade::class, compact(
            'symbol', 'limit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function balances()
    {
        return $this->createRequest(Endpoints\Balance::class);
    }

    /**
     * {@inheritdoc}
     */
    public function buy($symbol, $amount, $price)
    {
        return $this->createRequest(Endpoints\Buy::class, compact(
            'symbol', 'amount', 'price'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function sell($symbol, $amount, $price)
    {
        return $this->createRequest(Endpoints\Sell::class, compact(
            'symbol', 'amount', 'price'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function status($symbol, $id)
    {
        return $this->createRequest(Endpoints\Status::class, compact(
            'symbol', 'id'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function cancel($symbol, $id)
    {
        return $this->createRequest(Endpoints\Cancel::class, compact(
            'symbol', 'id'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function openOrders($symbol = null)
    {
        return $this->createRequest(Endpoints\OpenOrders::class, compact(
            'symbol'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function tradeHistory($symbol = null)
    {
        return $this->createRequest(Endpoints\TradeHistory::class, compact(
            'symbol'
        ));
    }
}
