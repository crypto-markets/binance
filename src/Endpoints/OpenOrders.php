<?php

namespace CryptoMarkets\Binance\Endpoints;

class OpenOrders extends Endpoint
{
    /**
     * Determine if the request need authorized.
     *
     * @var bool
     */
    protected $authorize = true;

    /**
     * Get the request url.
     *
     * @return string
     */
    public function getUrl()
    {
        return parent::getUrl() .'v3/openOrders';
    }

    /**
     * Get the request method.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }

    /**
     * Get the request data.
     *
     * @return array
     */
    public function getData()
    {
        return ['symbol' => $this->params['symbol']];
    }

    /**
     * Map the given array to create a response object.
     *
     * @param  array  $data
     * @return array
     */
    public function mapResponse(array $data = [])
    {
        return array_map(function ($item) {
            return [
                'id' => $item['orderId'],
                'symbol' => $item['symbol'],
                'side' => strtolower($item['side']),
                'type' => strtolower($item['type']),
                'status' => strtolower($item['status']),
                'price' => $item['price'],
                'amount' => $item['origQty'],
                'timestamp' => $item['time'],
            ];
        }, $data);
    }
}
