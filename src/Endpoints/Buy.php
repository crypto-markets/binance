<?php

namespace CryptoMarkets\Binance\Endpoints;

class Buy extends Endpoint
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
        return parent::getUrl().'v3/order';
    }

    /**
     * Get the request method.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
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
            'side' => 'BUY',
            'type' => 'LIMIT',
            'timeInForce' => 'GTC',
            'quantity' => $this->params['amount'],
            'price' => $this->params['price'],
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
            'id' => $data['orderId'],
            'symbol' => $data['symbol'],
            'side' => $data['side'],
            'type' => $data['type'],
            'status' => $data['status'],
            'price' => $data['price'],
            'amount' => $data['origQty'],
            'timestamp' => $data['transactTime'],
        ];
    }
}
