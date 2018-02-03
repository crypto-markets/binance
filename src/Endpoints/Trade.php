<?php

namespace CryptoMarkets\Binance\Endpoints;

class Trade extends Endpoint
{
    /**
     * Get the request url.
     *
     * @return string
     */
    public function getUrl()
    {
        return parent::getUrl().'v1/trades';
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
        return array_map(function ($item) {
            return [
                'id' => $item['id'],
                'symbol' => $this->params['symbol'],
                'side' => $item['isBuyerMaker'] ? 'buy' : 'sell',
                'type' => 'limit',
                'status' => 'open',
                'price' => $item['price'],
                'amount' => $item['qty'],
                'timestamp' => $item['time'],
            ];
        }, $data);
    }
}
