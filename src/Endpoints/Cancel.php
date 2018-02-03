<?php

namespace CryptoMarkets\Binance\Endpoints;

class Cancel extends Endpoint
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
        return parent::getUrl() .'v3/order';
    }

    /**
     * Get the request method.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'DELETE';
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
            'orderId' => $this->params['id'],
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
        return Status::handle($this->market, [
            'symbol' => $data['symbol'],
            'id' => $data['orderId'],
        ]);
    }
}
