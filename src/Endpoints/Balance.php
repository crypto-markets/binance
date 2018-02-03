<?php

namespace CryptoMarkets\Binance\Endpoints;

class Balance extends Endpoint
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
        return parent::getUrl() .'v3/account';
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
     * Map the given array to create a response object.
     *
     * @param  array  $data
     * @return array
     */
    public function mapResponse(array $data = [])
    {
        return array_map(function ($balance) {
            return [
                'symbol' => $balance['asset'],
                'amount' => $balance['free'],
                'locked' => $balance['locked'],
            ];
        }, $data['balances']);
    }
}
