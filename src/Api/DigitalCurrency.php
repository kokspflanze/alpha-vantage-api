<?php

declare(strict_types=1);

namespace AlphaVantage\Api;

class DigitalCurrency extends AbstractApi
{
    public const INTERVAL_1 = '1min';
    public const INTERVAL_5 = '5min';
    public const INTERVAL_15 = '15min';
    public const INTERVAL_30 = '30min';
    public const INTERVAL_60 = '60min';

    /**
     * @param string $symbol
     * @param null|string $dataType
     * @return array
     */
    public function digitalCurrencyRating(string $symbol, ?string $dataType = null)
    {
        return $this->get(
            'CRYPTO_RATING',
            $symbol,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbol
     * @param string $market
     * @param string $interval
     * @param null|string $dataType
     * @return array
     */
    public function digitalCurrencyIntraday(string $symbol, string $market, string $interval, ?string $dataType = null)
    {
        return $this->get(
            'CRYPTO_INTRADAY',
            $symbol,
            [
                'market' => $market,
                'interval' => $interval,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbol
     * @param string $market
     * @param null|string $dataType
     * @return array
     */
    public function digitalCurrencyDaily(string $symbol, string $market, ?string $dataType = null)
    {
        return $this->get(
            'DIGITAL_CURRENCY_DAILY',
            $symbol,
            [
                'market' => $market,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbol
     * @param string $market
     * @param null|string $dataType
     * @return array
     */
    public function digitalCurrencyWeekly(string $symbol, string $market, ?string $dataType = null)
    {
        return $this->get(
            'DIGITAL_CURRENCY_WEEKLY',
            $symbol,
            [
                'market' => $market,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbol
     * @param string $market
     * @param null|string $dataType
     * @return array
     */
    public function digitalCurrencyMonthly(string $symbol, string $market, ?string $dataType = null)
    {
        return $this->get(
            'DIGITAL_CURRENCY_MONTHLY',
            $symbol,
            [
                'market' => $market,
                'datatype' => $dataType,
            ]
        );
    }
}
