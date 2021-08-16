<?php

declare(strict_types=1);

namespace AlphaVantageTest\Api;

use AlphaVantage\Api\Fundamentals;
use DateTime;

class FundamentalsTest extends TestCase
{
    public function testCompanyOverview()
    {
        $actual = (new Fundamentals($this->option))->companyOverview(
            'IBM',
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(59, $actual);

        $this->assertArrayHasKey('Symbol', $actual);
        $this->assertSame('IBM', $actual['Symbol']);

        $this->assertArrayHasKey('AssetType', $actual);
        $this->assertSame('Common Stock', $actual['AssetType']);
    }

    public function testEarnings()
    {
        $actual = (new Fundamentals($this->option))->earnings(
            'IBM',
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(3, $actual);

        $this->assertArrayHasKey('symbol', $actual);
        $this->assertSame('IBM', $actual['symbol']);

        $this->assertArrayHasKey('annualEarnings', $actual);
        $this->assertNotEmpty($actual['annualEarnings']);

        $this->assertArrayHasKey('quarterlyEarnings', $actual);
        $this->assertNotEmpty($actual['quarterlyEarnings']);
    }

    public function testIncomeStatement()
    {
        $actual = (new Fundamentals($this->option))->incomeStatement(
            'IBM',
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(3, $actual);

        $this->assertArrayHasKey('symbol', $actual);
        $this->assertSame('IBM', $actual['symbol']);

        $this->assertArrayHasKey('annualReports', $actual);
        $this->assertNotEmpty($actual['annualReports']);

        $this->assertArrayHasKey('quarterlyReports', $actual);
        $this->assertNotEmpty($actual['quarterlyReports']);
    }

    public function testIncomeBalanceSheet()
    {
        $actual = (new Fundamentals($this->option))->balanceSheet(
            'IBM',
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(3, $actual);

        $this->assertArrayHasKey('symbol', $actual);
        $this->assertSame('IBM', $actual['symbol']);

        $this->assertArrayHasKey('annualReports', $actual);
        $this->assertNotEmpty($actual['annualReports']);

        $this->assertArrayHasKey('quarterlyReports', $actual);
        $this->assertNotEmpty($actual['quarterlyReports']);
    }

    public function testIncomeCashFlow()
    {
        $actual = (new Fundamentals($this->option))->cashFlow(
            'IBM',
            null
        );

        $this->assertIsArray($actual);
        $this->assertCount(3, $actual);

        $this->assertArrayHasKey('symbol', $actual);
        $this->assertSame('IBM', $actual['symbol']);

        $this->assertArrayHasKey('annualReports', $actual);
        $this->assertNotEmpty($actual['annualReports']);

        $this->assertArrayHasKey('quarterlyReports', $actual);
        $this->assertNotEmpty($actual['quarterlyReports']);
    }

    public function testListingStatus()
    {
        $actual = (new Fundamentals($this->option))->listingStatus(
            Fundamentals::STATE_DELISTED,
            new DateTime('2014-07-10'),
            null
        );

        $this->assertIsArray($actual);
    }
}
