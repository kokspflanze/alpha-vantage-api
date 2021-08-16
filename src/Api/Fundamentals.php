<?php

declare(strict_types=1);

namespace AlphaVantage\Api;

use DateTime;

class Fundamentals extends AbstractApi
{
    public const STATE_ACTIVE = 'active';
    public const STATE_DELISTED = 'delisted';

    public const HORIZON_3MONTH = '3month';
    public const HORIZON_6MONTH = '6month';
    public const HORIZON_12MONTH = '12month';

    /**
     * @param string $symbol
     * @param null|string $dataType
     * @return array
     */
    public function companyOverview(
        string  $symbol,
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'OVERVIEW',
            $symbol,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbol
     * @param null|string $dataType
     * @return array
     */
    public function earnings(
        string  $symbol,
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'EARNINGS',
            $symbol,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbol
     * @param null|string $dataType
     * @return array
     */
    public function incomeStatement(
        string  $symbol,
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'INCOME_STATEMENT',
            $symbol,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbol
     * @param null|string $dataType
     * @return array
     */
    public function balanceSheet(
        string  $symbol,
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'BALANCE_SHEET',
            $symbol,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $symbol
     * @param null|string $dataType
     * @return array
     */
    public function cashFlow(
        string  $symbol,
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'CASH_FLOW',
            $symbol,
            [
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param string $status
     * @param null|DateTime $date
     * @param null|string $dataType
     * @return array
     */
    public function listingStatus(
        string    $status = self::STATE_ACTIVE,
        ?DateTime $date = null,
        ?string   $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'LISTING_STATUS',
            null,
            [
                'status' => $status,
                'datatype' => $dataType,
                'date' => $date ? $date->format('Y-m-d') : null,
            ]
        );
    }

    /**
     * @param string $horizon
     * @param null|string $symbol
     * @param null|string $dataType
     * @return array
     */
    public function earningsCalendar(
        string $horizon = self::HORIZON_3MONTH,
        ?string $symbol = null,
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'EARNINGS_CALENDAR',
            $symbol,
            [
                'horizon' => $horizon,
                'datatype' => $dataType,
            ]
        );
    }

    /**
     * @param null|string $dataType
     * @return array
     */
    public function ipoCalendar(
        ?string $dataType = self::DATA_TYPE_JSON
    ) {
        return $this->get(
            'IPO_CALENDAR',
            null,
            [
                'datatype' => $dataType,
            ]
        );
    }
}
