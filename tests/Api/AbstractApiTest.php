<?php

namespace AlphaVantageTest\Api;

use AlphaVantage\Api\AbstractApi;
use AlphaVantage\Exception\RuntimeException;

class AbstractApiTest extends TestCase
{
    /** @var  \PHPUnit_Framework_MockObject_MockObject */
    protected $class;

    protected function setUp()
    {
        parent::setUp();
        $this->class = $this->getMockForAbstractClass(
            AbstractApi::class, [],
            '',
            false,
            true,
            true,
            null
        );
    }

    public function testConstructor()
    {
        $this->class->__construct($this->option);
        $this->addToAssertionCount(1);
    }

    public function testGetApiUrl()
    {
        $this->class->__construct($this->option);
        $result = $this->getMethod('getApiUri', $this->class)
            ->invokeArgs($this->class, []);

        $this->assertInternalType('string', $result);
        $this->assertSame('https://www.alphavantage.co/query?', $result);
    }

    public function testGetException()
    {
        $this->class->__construct($this->option);
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(
            'The **demo** API key is for demo purposes only. Please claim your free API key at (https://www.alphavantage.co/support/#api-key) so that you could issue any API call as you wish! It takes fewer than 20 seconds, and we are committed to making it free forever.'
        );

        $this->getMethod('get', $this->class)
            ->invokeArgs(
                $this->class,
                [
                    '',
                ]
            );
    }
}
