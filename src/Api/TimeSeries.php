<?php

namespace AlphaVantage\Api;

/**
 * Class TimeSeries
 * @package AlphaVantage\Api
 */
class TimeSeries extends AbstractApi
{
    const OUTPUT_TYPE_COMPACT = 'compact';
    const OUTPUT_TYPE_FULL = 'full';

    const INTERVAL_1 = '1min';
    const INTERVAL_5 = '5min';
    const INTERVAL_15 = '15min';
    const INTERVAL_30 = '30min';
    const INTERVAL_60 = '60min';

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param string $outputType
     * @return array
     */
    public function intraday(
        string $symbolName,
        string $exchangeName,
        string $interval,
        string $outputType = self::OUTPUT_TYPE_COMPACT
    ) {
        return $this->get(
            'TIME_SERIES_INTRADAY',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'outputsize' => $outputType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $outputType
     * @return array
     */
    public function daily(
        string $symbolName,
        string $exchangeName,
        string $outputType = self::OUTPUT_TYPE_COMPACT
    ) {
        return $this->get(
            'TIME_SERIES_DAILY',
            $symbolName,
            $exchangeName,
            [
                'outputsize' => $outputType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $outputType
     * @return array
     */
    public function dailyAdjusted(
        string $symbolName,
        string $exchangeName,
        string $outputType = self::OUTPUT_TYPE_COMPACT
    ) {
        return $this->get(
            'TIME_SERIES_DAILY_ADJUSTED',
            $symbolName,
            $exchangeName,
            [
                'outputsize' => $outputType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @return array
     */
    public function weekly(
        string $symbolName,
        string $exchangeName
    ) {
        return $this->get(
            'TIME_SERIES_WEEKLY',
            $symbolName,
            $exchangeName
        );
    }


}