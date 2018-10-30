<?php

namespace AlphaVantage;

/**
 * Class Options
 * @package AlphaVantage
 */
class Options
{
    /** @var string */
    protected $apiKey = '';

    /** @var string */
    protected $apiUrl = 'https://www.alphavantage.co/';

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     * @return self
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     * @return self
     */
    public function setApiUrl(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }
}
