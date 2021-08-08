<?php

declare(strict_types=1);

namespace AlphaVantageTest\Api;

use AlphaVantage\Api\Economics;

class EconomicsTest extends TestCase
{
    public function testRealGdp()
    {
        $actual = (new Economics($this->option))->realGdp(
            Economics::INTERVAL_ANNUAL,
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Real Gross Domestic Product', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('annual', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('billions of dollars', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testRealGdpPerCapita()
    {
        $actual = (new Economics($this->option))->realGdpPerCapita(null);

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Real Gross Domestic Product per Capita', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('quarterly', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('chained 2012 dollars', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testTreasuryYield()
    {
        $actual = (new Economics($this->option))->treasuryYield(
            Economics::INTERVAL_MONTHLY,
            Economics::MATURITY_10YEAR,
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('10-Year Treasury Constant Maturity Rate', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('monthly', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('percent', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testFederalFundsRate()
    {
        $actual = (new Economics($this->option))->federalFundsRate(
            Economics::INTERVAL_MONTHLY,
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Effective Federal Funds Rate', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('monthly', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('percent', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testCpi()
    {
        $actual = (new Economics($this->option))->cpi(
            Economics::INTERVAL_MONTHLY,
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Consumer Price Index for all Urban Consumers', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('monthly', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('index 1982-1984=100', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testInflation()
    {
        $actual = (new Economics($this->option))->inflation(null);

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Inflation - US Consumer Prices', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('annual', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('percent', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testInflationExpectation()
    {
        $actual = (new Economics($this->option))->inflationExpectation(null);

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Inflation Expectations', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('monthly', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('percent', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testConsumerSentiment()
    {
        $actual = (new Economics($this->option))->consumerSentiment(null);

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Consumer Sentiment & Consumer Confidence', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('monthly', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('index 1966:Q1=100', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testRetailSales()
    {
        $actual = (new Economics($this->option))->retailSales(null);

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Advance Retail Sales: Retail Trade', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('monthly', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('millions of dollars', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testDurables()
    {
        $actual = (new Economics($this->option))->durables(null);

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Manufacturer New Orders: Durable Goods', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('monthly', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('millions of dollars', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testUnemployment()
    {
        $actual = (new Economics($this->option))->unemployment(null);

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Unemployment Rate', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('monthly', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('percent', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }

    public function testNonfarmPayroll()
    {
        $actual = (new Economics($this->option))->nonfarmPayroll(null);

        $this->assertIsArray($actual);
        $this->assertCount(4, $actual);

        $this->assertArrayHasKey('name', $actual);
        $this->assertSame('Total Nonfarm Payroll', $actual['name']);

        $this->assertArrayHasKey('interval', $actual);
        $this->assertSame('monthly', $actual['interval']);

        $this->assertArrayHasKey('unit', $actual);
        $this->assertSame('thousands of persons', $actual['unit']);

        $this->assertArrayHasKey('data', $actual);
        $this->assertNotEmpty($actual['data']);
    }
}
