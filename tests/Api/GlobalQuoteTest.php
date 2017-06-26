<?php

namespace AlphaVantageTest\Api;

use AlphaVantage\Api\GlobalQuote;

class GlobalQuoteTest extends TestCase
{
    public function testGetGlobalQuote()
    {
        $actual = (new GlobalQuote($this->option))->getGlobalQuote($this->symbol, $this->exchange);

        $this->assertNotEmpty($actual);
        $this->assertInternalType('array', $actual);
    }
}
