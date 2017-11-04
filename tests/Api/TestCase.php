<?php

namespace AlphaVantageTest\Api;

use AlphaVantage\Options;
use ReflectionMethod;
use ReflectionProperty;

class TestCase extends \AlphaVantageTest\TestCase
{
    /** @var  Options */
    protected $option;
    /** @var string */
    protected $symbol = 'MSFT';

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

    /**
     * @param string $name
     * @param mixed  $value
     * @param object $class
     * @return ReflectionProperty
     */
    protected function setProperty($name, $value, $class)
    {
        $property = new ReflectionProperty($class, $name);
        $property->setAccessible(true);
        $property->setValue($class, $value);

        return $property;
    }
}