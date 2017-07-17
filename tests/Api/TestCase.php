<?php

namespace AlphaVantageTest\Api;

use AlphaVantage\Options;
use ReflectionMethod;

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

        $this->option = (new Options())->setApiKey('demo');
    }

    /**
     * @param string $name
     * @param object $class
     * @return ReflectionMethod
     */
    protected function getMethod($name, $class)
    {
        $method = new ReflectionMethod($class, $name);
        $method->setAccessible(true);

        return $method;
    }
}