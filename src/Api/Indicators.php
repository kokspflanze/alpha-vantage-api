<?php

namespace AlphaVantage\Api;

use AlphaVantage\Exception\BadMethodCallException;

/**
 * Class Indicators
 * @package AlphaVantage\Api
 *
 * @method array sma(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array ema(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array wma(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array dema(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array tema(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array trima(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array kama(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array t3(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array rsi(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array mom(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array smo(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array roc(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array rocr(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array trix(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array midpoint(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 */
class Indicators extends AbstractApi
{
    const INTERVAL_1 = '1min';
    const INTERVAL_5 = '5min';
    const INTERVAL_15 = '15min';
    const INTERVAL_30 = '30min';
    const INTERVAL_60 = '60min';
    const INTERVAL_DAILY = 'daily';
    const INTERVAL_WEEKLY = 'weekly';
    const INTERVAL_MONTHLY = 'monthly';

    const TIME_PERIOD_60 = 60;
    const TIME_PERIOD_200 = 200;

    const SERIES_TYPE_CLOSE = 'close';
    const SERIES_TYPE_OPEN = 'open';
    const SERIES_TYPE_LOW = 'low';
    const SERIES_TYPE_HIGH = 'high';

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $name = strtolower($name);
        switch ($name) {
            case 'sma':
            case 'ema':
            case 'wma':
            case 'dema':
            case 'tema':
            case 'trima':
            case 'kama':
            case 't3':
            case 'rsi':
            case 'mom':
            case 'smo':
            case 'roc':
            case 'rocr':
            case 'trix':
            case 'midpoint':
                $result = call_user_func_array([$this, 'basic'], array_merge([$name], $arguments));
                break;

            default:
                throw new BadMethodCallException(
                    sprintf('Undefined method called: "%s"', $name)
                );
        }

        return $result;
    }


    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param int $timePeriod
     * @param string $seriesType
     * @return array
     */
    protected function basic(
        string $name,
        string $symbolName,
        string $exchangeName,
        string $interval,
        int $timePeriod,
        string $seriesType
    ) {
        return $this->get(
            strtoupper($name),
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'time_period' => $timePeriod,
                'series_type' => $seriesType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param int $timePeriod
     * @param string $seriesType
     * @param float $fastLimit
     * @param float $slowLimit
     * @return array
     */
    public function mama(
        string $symbolName,
        string $exchangeName,
        string $interval,
        int $timePeriod,
        string $seriesType,
        float $fastLimit = 0.01,
        float $slowLimit = 0.01
    ) {
        return $this->get(
            'MAMA',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'time_period' => $timePeriod,
                'series_type' => $seriesType,
                'fastlimit' => $fastLimit,
                'slowlimit' => $slowLimit,
            ]
        );
    }
}