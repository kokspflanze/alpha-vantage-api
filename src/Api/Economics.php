<?php

declare(strict_types=1);

namespace AlphaVantage\Api;

class Economics extends AbstractApi
{
    public const INTERVAL_DAILY = 'daily';
    public const INTERVAL_WEEKLY = 'weekly';
    public const INTERVAL_MONTHLY = 'monthly';
    public const INTERVAL_QUARTERLY = 'quarterly';
    public const INTERVAL_ANNUAL = 'annual';

    public const MATURITY_3MONTH = '3month';
    public const MATURITY_5YEAR = '5year';
    public const MATURITY_10YEAR = '10year';
    public const MATURITY_30YEAR = '30year';

    /**
     * @param string $interval
     * @param null|string $dataType
     * @return array
     */
    public function realGdp(
        string $interval = self::INTERVAL_ANNUAL,
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'REAL_GDP',
            null,
            [
                'interval' => $interval,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param null|string $dataType
     * @return array
     */
    public function realGdpPerCapita(?string $dataType = self::DATA_TYPE_JSON)
    {
        return $this->get(
            'REAL_GDP_PER_CAPITA',
            null,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $interval
     * @param string $maturity
     * @param null|string $dataType
     * @return array
     */
    public function treasuryYield(
        string $interval = self::INTERVAL_MONTHLY,
        string $maturity = self::MATURITY_10YEAR,
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'TREASURY_YIELD',
            null,
            [
                'interval' => $interval,
                'maturity' => $maturity,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $interval
     * @param null|string $dataType
     * @return array
     */
    public function federalFundsRate(
        string $interval = self::INTERVAL_MONTHLY,
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'FEDERAL_FUNDS_RATE',
            null,
            [
                'interval' => $interval,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $interval
     * @param null|string $dataType
     * @return array
     */
    public function cpi(
        string $interval = self::INTERVAL_MONTHLY,
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'CPI',
            null,
            [
                'interval' => $interval,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param null|string $dataType
     * @return array
     */
    public function inflation(
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'INFLATION',
            null,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param null|string $dataType
     * @return array
     */
    public function inflationExpectation(
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'INFLATION_EXPECTATION',
            null,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param null|string $dataType
     * @return array
     */
    public function consumerSentiment(
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'CONSUMER_SENTIMENT',
            null,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param null|string $dataType
     * @return array
     */
    public function retailSales(
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'RETAIL_SALES',
            null,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param null|string $dataType
     * @return array
     */
    public function durables(
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'DURABLES',
            null,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param null|string $dataType
     * @return array
     */
    public function unemployment(
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'UNEMPLOYMENT',
            null,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param null|string $dataType
     * @return array
     */
    public function nonfarmPayroll(
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'NONFARM_PAYROLL',
            null,
            [
                'datatype' => $dataType,
            ]
        );
    }
}
