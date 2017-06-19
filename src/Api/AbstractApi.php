<?php

namespace AlphaVantage\Api;

use AlphaVantage\Options;
use GuzzleHttp\Client;

class AbstractApi
{
    /** @var string */
    protected $functionName = '';
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
     * @param $exchangeName
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function get(string $functionName, string $symbolName, $exchangeName, array $params = [])
    {
        unset($params['functions'], $params['functions']);

        $httpQuery = http_build_query(array_merge(
            [
                'function' => $functionName,
                'symbol' => sprintf('%s:%s', $exchangeName?: 'NASDAQ', $symbolName),
            ],
            $params
        ));

        $httpClient = new Client();
        return $httpClient->get($this->getApiUri() . $httpQuery);
    }

    /**
     * @return string
     */
    protected function getApiUri(): string
    {
        return $this->options->getApiUrl() . '/query?';
    }

}