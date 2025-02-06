# Guard Clauses

[![Latest Stable Version](https://poser.pugx.org/jdecool/guard-clauses/v/stable)](https://packagist.org/packages/jdecool/guard-clauses)
[![Build Status](https://github.com/jdecool/guard-clauses/workflows/CI/badge.svg?branch=main)](https://github.com/jdecool/guard-clauses/actions)
[![Total Downloads](https://poser.pugx.org/jdecool/guard-clauses/downloads)](https://packagist.org/packages/jdecool/guard-clauses)
[![License](https://poser.pugx.org/jdecool/guard-clauses/license)](https://packagist.org/packages/jdecool/guard-clauses)
[![Latest Unstable Version](https://poser.pugx.org/jdecool/guard-clauses/v/unstable)](https://packagist.org/packages/jdecool/guard-clauses)

A PHP library providing a clean and expressive way to implement guard clauses in your code. Built on top of [webmozart/assert](https://github.com/webmozart/assert), this library offers a fluent interface for input validation and defensive programming.

## Installation

You can install the package via Composer:

```bash
composer require jdecool/guard-clauses
```

## Requirements

- PHP 8.1 or higher

## Usage

The library provides a `Guard` class with static methods for various assertions:

```php
use JDecool\GuardClauses\Guard;

// Basic type checks
$validatedValue = Guard::string($value);
$validatedValue = Guard::integer($value);
$validatedValue = Guard::float($value);
$validatedValue = Guard::boolean($value);
$validatedValue = Guard::object($value);

// String validations
$validatedValue = Guard::stringNotEmpty($value);
$validatedValue = Guard::contains($string, $substring);
$validatedValue = Guard::startsWith($string, $prefix);
$validatedValue = Guard::endsWith($string, $suffix);

// Numeric comparisons
$validatedValue = Guard::greaterThan($number, $limit);
$validatedValue = Guard::lessThan($number, $limit);
$validatedValue = Guard::range($number, $min, $max);

// Array operations
$validatedValue = Guard::isArray($value);
$validatedValue = Guard::count($array, $expectedCount);
$validatedValue = Guard::keyExists($array, $key);

// And many more...
```

Each assertion method accepts an optional message parameter that will be used in the exception if the assertion fails:

```php
$validatedValue = Guard::string($value, 'The value must be a string');
```

## Error Handling

When an assertion fails, a `GuardClausesException` is thrown, which extends from `InvalidArgumentException`.

## Development

To contribute to the development of this library:

1. Clone the repository
2. Install dependencies: `composer install`
3. Run tests: `composer test`
4. Run static analysis: `composer lint`

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).
