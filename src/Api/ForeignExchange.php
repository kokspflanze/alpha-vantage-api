<?php

namespace AlphaVantage\Api;

class ForeignExchange extends AbstractApi
{
    /**
     * @param string $fromCurrency
     * @param string $toCurrency
     * @return array
     */
    public function currencyExchangeRate(string $fromCurrency, string $toCurrency)
    {
        return $this->get(
            'CURRENCY_EXCHANGE_RATE',
            null,
            [
                'from_currency' => $fromCurrency,
                'to_currency' => $toCurrency,
            ]
        );
    }

}