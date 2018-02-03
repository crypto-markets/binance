<?php

namespace CryptoMarkets\Binance\Endpoints;

class Symbol extends Endpoint
{
    /**
     * Get the request url.
     *
     * @return string
     */
    public function getUrl()
    {
        return parent::getUrl() .'v1/exchangeInfo';
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
        $output = [];

        foreach ($data['symbols'] as $symbol) {
            if ($symbol['status'] == 'TRADING') {
                $output[] = [
                    'symbol' => $symbol['symbol'],
                    'base' => $symbol['baseAsset'],
                    'quote' => $symbol['quoteAsset'],
                ];
            }
        }


        return $output;
    }
}
