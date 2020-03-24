# Alpha Vantage PHP Client

[![Build Status](https://travis-ci.org/kokspflanze/alpha-vantage-api.svg?branch=master)](https://travis-ci.org/kokspflanze/alpha-vantage-api)

The PHP-Client is a lightweight wrapper for the [Alpha Vantage](https://www.alphavantage.co).

## Requirements:
- PHP 7.1+
- composer (https://getcomposer.org/download/)
- AlphaVantage Key, that you get @ [AlphaVantage-Api-Key](https://www.alphavantage.co/support/#api-key)

## Install

```
php composer.phar require kokspflanze/alpha-vantage-api
```


## How to use it?

```php
<?php

// Option
$option = new AlphaVantage\Options();
$option->setApiKey('YOUR_KEY');

// Client
$client = new AlphaVantage\Client($option);
var_dump($client->foreignExchange()->currencyExchangeRate('BTC', 'CNY'));
```

### Factory for PSR-11 Container

You can also use it with containers, using the PSR-11 standard for easy integration in a project.

You need require the suggest `psr/container` package:

```
php composer.phar require psr/container
```

Register the Alpha Vantage Factory:

```php
return [
    'dependencies' => [
        'factories' => [
            'alphavantage' => \AlphaVantage\Factory\AlphaVantageFactory::class,
        ],
    ],
];
```

with the following configuration:

```php
return [
    'alpha_vantage' => [
        'api_key' => 'APIKEY',
    ]
];
```
