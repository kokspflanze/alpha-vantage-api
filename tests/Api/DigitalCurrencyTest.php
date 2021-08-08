<?php

declare(strict_types=1);

namespace AlphaVantageTest\Api;

use AlphaVantage\Api\DigitalCurrency;

class DigitalCurrencyTest extends TestCase
{
    public function testDigitalCurrencyIntraday()
    {
        $actual = (new DigitalCurrency($this->option))->digitalCurrencyIntraday(
            'ETH',
            'USD',
            DigitalCurrency::INTERVAL_5,
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(2, $actual);

        $this->assertArrayHasKey('Meta Data', $actual);
        $this->assertNotEmpty($actual['Meta Data']);

        $this->assertArrayHasKey('Time Series Crypto (5min)', $actual);
        $this->assertNotEmpty($actual['Time Series Crypto (5min)']);
    }

    public function testDigitalCurrencyDaily()
    {
        $actual = (new DigitalCurrency($this->option))->digitalCurrencyDaily(
            'BTC',
            'CNY',
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(2, $actual);

        $this->assertArrayHasKey('Meta Data', $actual);
        $this->assertNotEmpty($actual['Meta Data']);

        $this->assertArrayHasKey('Time Series (Digital Currency Daily)', $actual);
        $this->assertNotEmpty($actual['Time Series (Digital Currency Daily)']);
    }

    public function testDigitalCurrencyWeekly()
    {
        $actual = (new DigitalCurrency($this->option))->digitalCurrencyWeekly(
            'BTC',
            'CNY',
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(2, $actual);

        $this->assertArrayHasKey('Meta Data', $actual);
        $this->assertNotEmpty($actual['Meta Data']);

        $this->assertArrayHasKey('Time Series (Digital Currency Weekly)', $actual);
        $this->assertNotEmpty($actual['Time Series (Digital Currency Weekly)']);
    }

    public function testDigitalCurrencyMonthly()
    {
        $actual = (new DigitalCurrency($this->option))->digitalCurrencyMonthly(
            'BTC',
            'CNY',
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(2, $actual);

        $this->assertArrayHasKey('Meta Data', $actual);
        $this->assertNotEmpty($actual['Meta Data']);

        $this->assertArrayHasKey('Time Series (Digital Currency Monthly)', $actual);
        $this->assertNotEmpty($actual['Time Series (Digital Currency Monthly)']);
    }
}
