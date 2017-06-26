<?php

namespace AlphaVantageTest\Api;

use AlphaVantage\Options;

class TestCase extends \AlphaVantageTest\TestCase
{
    /** @var  Options */
    protected $option;
    /** @var string */
    protected $symbol = 'MSFT';
    /** @var string */
    protected $exchange = 'NASDAQ';

    protected function setUp()
    {
        parent::setUp();

        $this->option = (new Options())->setApiKey('Demo');
    }

}