# Alpha Vantage PHP Client

[![Build Status](https://travis-ci.org/kokspflanze/alpha-vantage-api.svg?branch=master)](https://travis-ci.org/kokspflanze/alpha-vantage-api)

The PHP-Client is a lightweight wrapper for the Alpha Vantage API.

## Requirements:
- PHP 7.0+
- composer (https://getcomposer.org/download/)

## Install

```
php composer.phar require kokspflanze/alpha-vantage-api
```


## How to use it?

```
$option = new AlphaVantage\Options();
$option->setApiKey('YOUR_KEY');
$client = new AlphaVantage\Client($option);
var_dump($client->foreignExchange()->currencyExchangeRate('BTC', 'CNY'));
```
