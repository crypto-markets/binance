<?php

namespace CryptoMarkets\Binance\Endpoints;

use CryptoMarkets\Common\Endpoint as BaseEndpoint;

abstract class Endpoint extends BaseEndpoint
{
    /**
     * Get the request url.
     *
     * @return string
     */
    public function getUrl()
    {
        return 'https://api.binance.com/api/';
    }

    /**
     * Get the request headers.
     *
     * @return array
     */
    public function getHeaders()
    {
        return array_replace(parent::getHeaders(), [
            'X-MBX-APIKEY' => $this->params['api_key'],
        ]);
    }

    /**
     * Get the authentication request data.
     *
     * @return array
     */
    protected function authenticationData()
    {
        $params = $this->getData();

        $params['timestamp'] = number_format(microtime(true) * 1000, 0, '.', '');

        $query = http_build_query($params, '', '&');

        $params['signature'] = hash_hmac('sha256', $query, $this->params['secret']);

        return $params;
    }
}
