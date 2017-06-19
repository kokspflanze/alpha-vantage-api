<?php

namespace AlphaVantage\Api;

class GlobalQuote extends AbstractApi
{
    /** @var string */
    protected $functionName = 'GLOBAL_QUOTE';

    /**
     * @param string $symbolName
     * @param string|null $exchangeName
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getGlobalQuote(string $symbolName, string $exchangeName = null)
    {
        return $this->get('GLOBAL_QUOTE', $symbolName, $exchangeName);
    }
}