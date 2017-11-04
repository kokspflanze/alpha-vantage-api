<?php

namespace AlphaVantageTest\Api;

use AlphaVantage\Api\ForeignExchange;

class ForeignExchangeTest extends TestCase
{
    public function testCurrencyExchangeRate()
    {
        $actual = (new ForeignExchange($this->option))->currencyExchangeRate('BTC', 'CNY');
        $this->assertInternalType('array', $actual);
        $this->assertCount(1, $actual);
        $this->assertArrayHasKey('Realtime Currency Exchange Rate', $actual);
        $this->assertNotEmpty($actual['Realtime Currency Exchange Rate']);
        $this->assertCount(7, $actual['Realtime Currency Exchange Rate']);
    }
}
