<?php

namespace AlphaVantage;

/**
 * Class Client
 * @package AlphaVantage
 *
 * @method Api\TimeSeries timeSeries()
 * @method Api\Indicators indicators()
 * @method Api\Performance performance()
 * @method Api\ForeignExchange foreignExchange()
 * @method Api\DigitalCurrency digitalCurrency()
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
            case 'timeseries':
                $api = new Api\TimeSeries($this->options);
                break;
            case 'indicators':
                $api = new Api\Indicators($this->options);
                break;
            case 'performance':
                $api = new Api\Performance($this->options);
                break;
            case 'foreignexchange':
                $api = new Api\ForeignExchange($this->options);
                break;
            case 'digitalcurrency':
                $api = new Api\DigitalCurrency($this->options);
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
