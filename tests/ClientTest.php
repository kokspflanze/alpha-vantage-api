<?php

namespace AlphaVantageTest;

use AlphaVantage\Api\AbstractApi;
use AlphaVantage\Client;
use AlphaVantage\Exception;
use AlphaVantage\Options;

class ClientTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(Client::class, new Client(new Options()));
    }

    public function testMagicCallException()
    {
        $this->expectException(Exception\BadMethodCallException::class);
        $this->expectExceptionMessage('Undefined method called: "performance2"');

        $client = new Client(new Options());
        $client->performance2();
    }

    public function testMagicCall()
    {
        $client = new Client(new Options());
        $actual = $client->timeseries();

        $this->assertInstanceOf(AbstractApi::class, $actual);
    }

    public function testMagicCallUpperCase()
    {
        $client = new Client(new Options());
        $actual = $client->foreignExchange();

        $this->assertInstanceOf(AbstractApi::class, $actual);
    }


    public function testMagicCallCaseNotMatch()
    {
        $client = new Client(new Options());
        $actual = $client->time_Series();

        $this->assertInstanceOf(AbstractApi::class, $actual);
    }

    public function testApiException()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('Undefined api instance called: "performance2"');

        $client = new Client(new Options());
        $client->api('performance2');
    }
}
