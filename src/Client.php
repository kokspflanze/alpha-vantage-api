<?php

namespace AlphaVantage;

/**
 * Class Client
 * @package AlphaVantage
 *
 * @method Api\GlobalQuote globalquote
 * @method Api\TimeSeries timeseries
 * @method Api\Indicators indicators
 */
class Client
{
    /** @var  Options */
    protected $options;

    /**
     * Client constructor.
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    /**
     * @param string $name
     * @return Api\AbstractApi
     * @throws Exception\InvalidArgumentException
     */
    public function api(string $name): Api\AbstractApi
    {
        $name = $this->getApiName($name);

        switch ($name) {
            case 'globalquote' :
                $api = new Api\GlobalQuote($this->options);
                break;
            case 'timeseries' :
                $api = new Api\TimeSeries($this->options);
                break;
            case 'indicators' :
                $api = new Api\Indicators($this->options);
                break;

            default:
                throw new Exception\InvalidArgumentException(
                    sprintf('Undefined api instance called: "%s"', $name)
                );
        }

        return $api;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return Api\AbstractApi
     */
    public function __call(string $name, array $arguments): Api\AbstractApi
    {
        try {
            return $this->api($name);
        } catch (Exception\InvalidArgumentException $exception) {
            throw new Exception\BadMethodCallException(
                sprintf('Undefined method called: "%s"', $name)
            );
        }
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getApiName(string $name): string
    {
        return strtolower(str_replace(['_', ''], '', $name));
    }

}