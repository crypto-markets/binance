<?php

namespace CryptoMarkets\Binance\Endpoints;

class Ticker extends Endpoint
{
    /**
     * Get the request url.
     *
     * @return string
     */
    public function getUrl()
    {
        return parent::getUrl().'v1/ticker/24hr';
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
        return [
           'low' => $data['lowPrice'],
           'high' => $data['highPrice'],
           'last' => $data['lastPrice'],
           'volume' => $data['volume'],
           'open' => $data['openPrice'],
           'bid' => $data['bidPrice'],
           'ask' => $data['askPrice'],
           'average' => $data['weightedAvgPrice'],
           'timestamp' => $data['closeTime'],
        ];
    }
}
