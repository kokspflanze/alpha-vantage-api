<?php

namespace AlphaVantage\Api;

class ForeignExchange extends AbstractApi
{
    const OUTPUT_TYPE_COMPACT = 'compact';
    const OUTPUT_TYPE_FULL = 'full';

    const INTERVAL_1 = '1min';
    const INTERVAL_5 = '5min';
    const INTERVAL_15 = '15min';
    const INTERVAL_30 = '30min';
    const INTERVAL_60 = '60min';

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

    /**
     * @param string $fromSymbol
     * @param string $toSymbol
     * @param string $interval
     * @param string $outputType
     * @param string $dataType
     * @return array
     */
    public function intraday(
        string $fromSymbol,
        string $toSymbol,
        string $interval,
        string $outputType = self::OUTPUT_TYPE_COMPACT,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'FX_INTRADAY',
            null,
            [
                'from_symbol' => $fromSymbol,
                'to_symbol' => $toSymbol,
                'interval' => $interval,
                'outputsize' => $outputType,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $fromSymbol
     * @param string $toSymbol
     * @param string $outputType
     * @param string $dataType
     * @return array
     */
    public function daily(
        string $fromSymbol,
        string $toSymbol,
        string $outputType = self::OUTPUT_TYPE_COMPACT,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'FX_DAILY',
            null,
            [
                'from_symbol' => $fromSymbol,
                'to_symbol' => $toSymbol,
                'outputsize' => $outputType,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $fromSymbol
     * @param string $toSymbol
     * @param string $dataType
     * @return array
     */
    public function weekly(
        string $fromSymbol,
        string $toSymbol,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'FX_WEEKLY',
            null,
            [
                'from_symbol' => $fromSymbol,
                'to_symbol' => $toSymbol,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $fromSymbol
     * @param string $toSymbol
     * @param string $dataType
     * @return array
     */
    public function monthly(
        string $fromSymbol,
        string $toSymbol,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'FX_MONTHLY',
            null,
            [
                'from_symbol' => $fromSymbol,
                'to_symbol' => $toSymbol,
                'datatype' => $dataType,
            ]
        );
    }
}
