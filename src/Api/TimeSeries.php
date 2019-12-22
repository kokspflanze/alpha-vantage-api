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
     * @param string $interval
     * @param string $outputType
     * @param string $dataType
     * @return array
     */
    public function intraday(
        string $symbolName,
        string $interval,
        string $outputType = self::OUTPUT_TYPE_COMPACT,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'TIME_SERIES_INTRADAY',
            $symbolName,
            [
                'interval' => $interval,
                'outputsize' => $outputType,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $outputType
     * @param string $dataType
     *
     * @return array
     */
    public function daily(
        string $symbolName,
        string $outputType = self::OUTPUT_TYPE_COMPACT,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'TIME_SERIES_DAILY',
            $symbolName,
            [
                'outputsize' => $outputType,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $outputType
     * @param string $dataType
     *
     * @return array
     */
    public function dailyAdjusted(
        string $symbolName,
        string $outputType = self::OUTPUT_TYPE_COMPACT,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'TIME_SERIES_DAILY_ADJUSTED',
            $symbolName,
            [
                'outputsize' => $outputType,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $dataType
     *
     * @return array
     */
    public function weekly(
        string $symbolName,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'TIME_SERIES_WEEKLY',
            $symbolName,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $outputType
     * @param string $dataType
     *
     * @return array
     */
    public function weeklyAdjusted(
        string $symbolName,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'TIME_SERIES_WEEKLY_ADJUSTED',
            $symbolName,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $dataType
     *
     * @return array
     */
    public function monthly(
        string $symbolName,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'TIME_SERIES_MONTHLY',
            $symbolName,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $outputType
     * @param string $dataType
     *
     * @return array
     */
    public function monthlyAdjusted(
        string $symbolName,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'TIME_SERIES_MONTHLY_ADJUSTED',
            $symbolName,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $dataType
     *
     * @return array
     */
    public function globalQuote(
        string $symbolName,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'GLOBAL_QUOTE',
            $symbolName,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $keywords
     * @param string $dataType
     *
     * @return array
     */
    public function symbolSearch(
        string $keywords,
        string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'SYMBOL_SEARCH',
            null,
            [
                'keywords' => $keywords,
                'datatype' => $dataType,
            ]
        );
    }
}
