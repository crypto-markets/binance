<?php

namespace CryptoMarkets\Binance\Endpoints;

class OrderBook extends Endpoint
{
    /**
     * Get the request url.
     *
     * @return string
     */
    public function getUrl()
    {
        return parent::getUrl().'v1/depth';
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
        return [
            'symbol' => $this->params['symbol'],
            'limit'  => $this->params['limit'],
        ];
    }

    /**
     * Map the given array to create a response object.
     *
     * @param  array  $data
     * @return array
     */
    public function mapResponse(array $data = [])
    {
        return [
            'bids' => $this->transform($data['bids']),
            'asks' => $this->transform($data['asks']),
        ];
    }

    /**
     * Transform the given orders.
     *
     * @param  array  $orders
     * @return array
     */
    protected function transform(array $orders)
    {
        $timestamp = strtotime('now');

        return array_map(function ($order) use ($timestamp) {
            return [
                'price' => $order[0],
                'amount' => $order[1],
                'timestamp' => $timestamp,
            ];
        }, $orders);
    }
}
