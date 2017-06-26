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
 * @method array cmo(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array roc(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array rocr(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array trix(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array midpoint(string $symbolName, string $exchangeName, string $interval, int $timePeriod, string $seriesType)
 * @method array willr(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array adx(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array adxr(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array cci(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array aroon(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array aroonosc(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array mfi(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array dx(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array minusDi(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array plusDi(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array minusDm(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array midprice(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array atr(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array natr(string $symbolName, string $exchangeName, string $interval, int $timePeriod)
 * @method array bop(string $symbolName, string $exchangeName, string $interval)
 * @method array trange(string $symbolName, string $exchangeName, string $interval)
 * @method array ad(string $symbolName, string $exchangeName, string $interval)
 * @method array obv(string $symbolName, string $exchangeName, string $interval)
 * @method array htTrendline(string $symbolName, string $exchangeName, string $interval, string $seriesType)
 * @method array htSine(string $symbolName, string $exchangeName, string $interval, string $seriesType)
 * @method array htTrendmode(string $symbolName, string $exchangeName, string $interval, string $seriesType)
 * @method array htDcPeriod(string $symbolName, string $exchangeName, string $interval, string $seriesType)
 * @method array htDcPhase(string $symbolName, string $exchangeName, string $interval, string $seriesType)
 * @method array htPhasor(string $symbolName, string $exchangeName, string $interval, string $seriesType)
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
            case 'cmo':
            case 'roc':
            case 'rocr':
            case 'trix':
            case 'midpoint':
                $result = call_user_func_array([$this, 'basic'], array_merge([$name], $arguments));
                break;

            case 'willr':
            case 'adx':
            case 'adxr':
            case 'cci':
            case 'aroon':
            case 'aroonosc':
            case 'mfi':
            case 'dx':
            case 'midprice':
            case 'atr':
            case 'natr':
                $result = call_user_func_array([$this, 'basicTimePeriod'], array_merge([$name], $arguments));
                break;

            case 'minusdi':
                $result = call_user_func_array([$this, 'basicTimePeriod'], array_merge(['minus_di'], $arguments));
                break;

            case 'plusdi':
                $result = call_user_func_array([$this, 'basicTimePeriod'], array_merge(['plus_di'], $arguments));
                break;

            case 'minusdm':
                $result = call_user_func_array([$this, 'basicTimePeriod'], array_merge(['minus_dm'], $arguments));
                break;

            case 'plusdm':
                $result = call_user_func_array([$this, 'basicTimePeriod'], array_merge(['plus_dm'], $arguments));
                break;

            case 'bop':
            case 'trange':
            case 'ad':
            case 'obv':
                $result = call_user_func_array([$this, 'basicInterval'], array_merge([$name], $arguments));
                break;

            case 'httrendline':
                $result = call_user_func_array([$this, 'basicSeriesType'], array_merge(['ht_trendline'], $arguments));
                break;

            case 'htsine':
                $result = call_user_func_array([$this, 'basicSeriesType'], array_merge(['ht_sine'], $arguments));
                break;

            case 'httrendmode':
                $result = call_user_func_array([$this, 'basicSeriesType'], array_merge(['ht_trendmode'], $arguments));
                break;

            case 'htdcperiod':
                $result = call_user_func_array([$this, 'basicSeriesType'], array_merge(['ht_dcperiod'], $arguments));
                break;

            case 'htphasor':
                $result = call_user_func_array([$this, 'basicSeriesType'], array_merge(['ht_phasor'], $arguments));
                break;

            case 'htdcphase':
                $result = call_user_func_array([$this, 'basicSeriesType'], array_merge(['ht_dcphase'], $arguments));
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

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param string $seriesType
     * @param int $fastPeriod
     * @param int $slowPeriod
     * @param int $signalPeriod
     * @return array
     */
    public function macd(
        string $symbolName,
        string $exchangeName,
        string $interval,
        string $seriesType,
        int $fastPeriod = 12,
        int $slowPeriod = 26,
        int $signalPeriod = 9
    ) {
        return $this->get(
            'MACD',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'series_type' => $seriesType,
                'fastperiod' => $fastPeriod,
                'slowperiod' => $slowPeriod,
                'signalperiod' => $signalPeriod,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param string $seriesType
     * @param int $fastPeriod
     * @param int $slowPeriod
     * @param int $signalPeriod
     * @return array
     */
    public function macdext(
        string $symbolName,
        string $exchangeName,
        string $interval,
        string $seriesType,
        int $fastPeriod = 12,
        int $slowPeriod = 26,
        int $signalPeriod = 9,
        int $fastMaType = 0,
        int $slowMaType = 0,
        int $signalMaType = 0
    ) {
        return $this->get(
            'MACDEXT',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'series_type' => $seriesType,
                'fastperiod' => $fastPeriod,
                'slowperiod' => $slowPeriod,
                'signalperiod' => $signalPeriod,
                'fastmatype' => $fastMaType,
                'slowmatype' => $slowMaType,
                'signalmatype' => $signalMaType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param int $fastKPeriod
     * @param int $slowKPeriod
     * @param int $slowDPeriod
     * @param int $slowKmaType
     * @param int $slowDmaType
     * @return array
     */
    public function stoch(
        string $symbolName,
        string $exchangeName,
        string $interval,
        int $fastKPeriod = 5,
        int $slowKPeriod = 3,
        int $slowDPeriod = 3,
        int $slowKmaType = 0,
        int $slowDmaType = 0
    ) {
        return $this->get(
            'STOCH',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'fastkperiod' => $fastKPeriod,
                'slowkperiod' => $slowKPeriod,
                'slowdperiod' => $slowDPeriod,
                'slowkmatype' => $slowKmaType,
                'slowdmatype' => $slowDmaType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param int $fastKPeriod
     * @param int $fastDPeriod
     * @param int $fastDmaPeriod
     * @return array
     */
    public function stochf(
        string $symbolName,
        string $exchangeName,
        string $interval,
        int $fastKPeriod = 5,
        int $fastDPeriod = 3,
        int $fastDmaPeriod = 0
    ) {
        return $this->get(
            'STOCHF',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'fastkperiod' => $fastKPeriod,
                'fastdperiod' => $fastDPeriod,
                'fastdmatype' => $fastDmaPeriod,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param int $fastKPeriod
     * @param int $fastDPeriod
     * @param int $fastDmaPeriod
     * @return array
     */
    public function stochrsi(
        string $symbolName,
        string $exchangeName,
        string $interval,
        int $timePeriod,
        string $seriesType,
        int $fastKPeriod = 5,
        int $fastDPeriod = 3,
        int $fastDmaPeriod = 0
    ) {
        return $this->get(
            'STOCHRSI',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'time_period' => $timePeriod,
                'series_type' => $seriesType,
                'fastkperiod' => $fastKPeriod,
                'fastdperiod' => $fastDPeriod,
                'fastdmatype' => $fastDmaPeriod,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param int $fastPeriod
     * @param int $slowPeriod
     * @param int $maType
     * @return array
     */
    public function apo(
        string $symbolName,
        string $exchangeName,
        string $interval,
        string $seriesType,
        int $fastPeriod = 12,
        int $slowPeriod = 26,
        int $maType = 0
    ) {
        return $this->get(
            'APO',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'series_type' => $seriesType,
                'fastperiod' => $fastPeriod,
                'slowperiod' => $slowPeriod,
                'matype' => $maType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param int $fastPeriod
     * @param int $slowPeriod
     * @param int $maType
     * @return array
     */
    public function ppo(
        string $symbolName,
        string $exchangeName,
        string $interval,
        string $seriesType,
        int $fastPeriod = 12,
        int $slowPeriod = 26,
        int $maType = 0
    ) {
        return $this->get(
            'PPO',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'series_type' => $seriesType,
                'fastperiod' => $fastPeriod,
                'slowperiod' => $slowPeriod,
                'matype' => $maType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param int $timePeriod2
     * @param int $timePeriod3
     * @return array
     */
    public function ultosc(
        string $symbolName,
        string $exchangeName,
        string $interval,
        int $timePeriod1 = 7,
        int $timePeriod2 = 14,
        int $timePeriod3 = 28
    ) {
        return $this->get(
            'ULTOSC',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'timeperiod1' => $timePeriod1,
                'timeperiod2' => $timePeriod2,
                'timeperiod3' => $timePeriod3,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param int $timePeriod
     * @param string $seriesType
     * @param int $nbdevup
     * @param int $nbdevdn
     * @param int $maType
     * @return array
     */
    public function bbands(
        string $symbolName,
        string $exchangeName,
        string $interval,
        int $timePeriod,
        string $seriesType,
        int $nbdevup = 2,
        int $nbdevdn = 2,
        int $maType = 0
    ) {
        return $this->get(
            'BBANDS',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'time_period' => $timePeriod,
                'series_type' => $seriesType,
                'nbdevup' => $nbdevup,
                'nbdevdn' => $nbdevdn,
                'matype' => $maType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param float $acceleration
     * @param float $maximum
     * @return array
     */
    public function sar(
        string $symbolName,
        string $exchangeName,
        string $interval,
        float $acceleration = 0.01,
        float $maximum = 0.20
    ) {
        return $this->get(
            'SAR',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'acceleration' => $acceleration,
                'maximum' => $maximum,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param int $fastPeriod
     * @param int $slowPeriod
     * @return array
     */
    public function adosc(
        string $symbolName,
        string $exchangeName,
        string $interval,
        int $fastPeriod = 3,
        int $slowPeriod = 10
    ) {
        return $this->get(
            'ADOSC',
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'fastperiod' => $fastPeriod,
                'slowperiod' => $slowPeriod,
            ]
        );
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
     * @return array
     */
    protected function basicTimePeriod(
        string $name,
        string $symbolName,
        string $exchangeName,
        string $interval,
        int $timePeriod
    ) {
        return $this->get(
            strtoupper($name),
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'time_period' => $timePeriod,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @param string $seriesType
     * @return array
     */
    protected function basicSeriesType(
        string $name,
        string $symbolName,
        string $exchangeName,
        string $interval,
        string $seriesType
    ) {
        return $this->get(
            strtoupper($name),
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
                'series_type' => $seriesType,
            ]
        );
    }

    /**
     * @param string $symbolName
     * @param string $exchangeName
     * @param string $interval
     * @return array
     */
    protected function basicInterval(
        string $name,
        string $symbolName,
        string $exchangeName,
        string $interval
    ) {
        return $this->get(
            strtoupper($name),
            $symbolName,
            $exchangeName,
            [
                'interval' => $interval,
            ]
        );
    }

}