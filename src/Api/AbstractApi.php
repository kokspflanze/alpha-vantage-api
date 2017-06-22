<?php

namespace AlphaVantage\Api;

use AlphaVantage\Options;
use GuzzleHttp\Client;

class AbstractApi
{
    /** @var  Options */
    protected $options;

    /**
     * AbstractApi constructor.
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    /**
     * @param string $functionName
     * @param string $symbolName
     * @param null|string $exchangeName
     * @param array $params
     * @return array
     */
    protected function get(string $functionName, string $symbolName, $exchangeName = null, array $params = [])
    {
        unset($params['functions'], $params['functions'], $params['apikey']);

        $httpQuery = http_build_query(array_merge(
            [
                'function' => $functionName,
                'symbol' => sprintf('%s:%s', $exchangeName?: 'NASDAQ', $symbolName),
                'apikey' => $this->options->getApiKey(),
            ],
            $params
        ));

        $httpClient = new Client();
        $response = $httpClient->get($this->getApiUri() . $httpQuery);

        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return string
     */
    protected function getApiUri(): string
    {
        return $this->options->getApiUrl() . '/query?';
    }

}