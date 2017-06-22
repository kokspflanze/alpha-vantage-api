<?php

namespace AlphaVantage\Api;

class GlobalQuote extends AbstractApi
{
    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @return array
     */
    public function getGlobalQuote(string $symbolName, string $exchangeName)
    {
        return $this->get('GLOBAL_QUOTE', $symbolName, $exchangeName);
    }
}