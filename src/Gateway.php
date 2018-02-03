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
    public function symbols(array $params = [])
    {
        return $this->createRequest(Endpoints\Symbol::class, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function ticker(array $params = [])
    {
        return $this->createRequest(Endpoints\Ticker::class, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function orderBook(array $params = [])
    {
        return $this->createRequest(Endpoints\OrderBook::class, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function trades(array $params = [])
    {
        return $this->createRequest(Endpoints\Trade::class, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function balances(array $params = [])
    {
        return $this->createRequest(Endpoints\Balance::class, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function buy(array $params = [])
    {
        return $this->createRequest(Endpoints\Buy::class, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function sell(array $params = [])
    {
        return $this->createRequest(Endpoints\Sell::class, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function status(array $params = [])
    {
        return $this->createRequest(Endpoints\Status::class, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function cancel(array $params = [])
    {
        return $this->createRequest(Endpoints\Cancel::class, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function openOrders(array $params = [])
    {
        return $this->createRequest(Endpoints\OpenOrders::class, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function tradeHistory(array $params = [])
    {
        return $this->createRequest(Endpoints\TradeHistory::class, $params);
    }
}
