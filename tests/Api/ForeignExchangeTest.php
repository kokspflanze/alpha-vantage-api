<?php

declare(strict_types=1);

namespace AlphaVantageTest\Api;

use AlphaVantage\Api\ForeignExchange;

class ForeignExchangeTest extends TestCase
{
    public function testCurrencyExchangeRate()
    {
        $actual = (new ForeignExchange($this->option))->currencyExchangeRate('BTC', 'CNY');
        $this->assertIsArray($actual);
        $this->assertCount(1, $actual);
        $this->assertArrayHasKey('Realtime Currency Exchange Rate', $actual);
        $this->assertNotEmpty($actual['Realtime Currency Exchange Rate']);
        $this->assertCount(9, $actual['Realtime Currency Exchange Rate']);
    }
}
