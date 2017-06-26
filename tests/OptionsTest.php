<?php

namespace AlphaVantageTest;

use AlphaVantage\Options;

class OptionsTest extends TestCase
{

    public function testApiKey()
    {
        $option = new Options();
        $this->assertEmpty($option->getApiKey());

        $randomString = (string)rand(100,156489);
        $option->setApiKey($randomString);
        $this->assertSame($randomString, $option->getApiKey());
    }

    public function testApiUrl()
    {
        $option = new Options();
        $this->assertNotEmpty($option->getApiUrl());

        $randomString = (string)rand(100,156489);
        $option->setApiUrl($randomString);
        $this->assertSame($randomString, $option->getApiUrl());
    }
}
