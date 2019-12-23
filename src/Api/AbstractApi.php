<?php

namespace AlphaVantage\Api;

use AlphaVantage\Exception\RuntimeException;
use AlphaVantage\Options;
use GuzzleHttp\Client;

use function GuzzleHttp\json_decode;
use function http_build_query;
use function array_merge;
use function rtrim;

/**
 * Class AbstractApi
 * @package AlphaVantage\Api
 */
class AbstractApi
{
    const DATA_TYPE_JSON = 'json';
    const DATA_TYPE_CSV = 'csv';

    /** @var  Options */
    protected $options;

    /** @var  Client */
    protected $client;

    /**
     * AbstractApi constructor.
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
        $this->client = new Client();
    }

    /**
     * @param string $functionName
     * @param null|string $symbolName
     * @param array $params
     * @return array
     */
    protected function get(string $functionName, string $symbolName = null, array $params = [])
    {
        unset($params['functions'], $params['function'], $params['apikey']);

        $basicData = [
            'function' => $functionName,
        ];

        if (null !== $symbolName) {
            $basicData['symbol'] = $symbolName;
        }

        $httpQuery = http_build_query(
            array_merge(
                $basicData,
                $params,
                [
                    'apikey' => $this->options->getApiKey(),
                ]
            )
        );

        $response = $this->client->get($this->getApiUri() . $httpQuery);

        $result = json_decode($response->getBody()->getContents(), true);

        if (isset($result['Error Message'])) {
            throw new RuntimeException($result['Error Message'], $response->getStatusCode());
        } elseif (isset($result['Note'])) {
            throw new RuntimeException($result['Note'], $response->getStatusCode());
        }

        return $result;
    }

    /**
     * @return string
     */
    protected function getApiUri(): string
    {
        return rtrim($this->options->getApiUrl(), '/') . '/query?';
    }
}
