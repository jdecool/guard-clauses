<?php

declare(strict_types=1);

namespace JDecool\GuardClauses;

use Error;
use Webmozart\Assert\Assert;
use Webmozart\Assert\InvalidArgumentException;

/**
 * @template T of object
 *
 * @method static string string(mixed $value, string $message = '') Check that value is string
 * @method static non-empty-string stringNotEmpty(mixed $value, string $message = '') Check that value is a non-empty string
 * @method static int integer(mixed $value, string $message = '') Check that value is integer
 * @method static numeric integerish(mixed $value, string $message = '') Check that value is integerish
 * @method static positive-int positiveInteger(mixed $value, string $message = '') Check that value is a positive integer
 * @method static float float(mixed $value, string $message = '') Check that value is float
 * @method static numeric numeric(mixed $value, string $message = '') Check that value is numeric
 * @method static int natural(mixed $value, string $message = '') Check that value is a natural number (non-negative integer)
 * @method static bool boolean(mixed $value, string $message = '') Check that value is boolean
 * @method static scalar scalar(mixed $value, string $message = '') Check that value is scalar
 * @method static object object(mixed $value, string $message = '') Check that value is object
 * @method static resource resource(mixed $value, string|null $type = null, string $message = '') Check that value is resource
 * @method static callable isCallable(mixed $value, string $message = '') Check that value is callable
 * @method static array isArray(mixed $value, string $message = '') Check that value is array
 * @method static \Traversable|array isTraversable(mixed $value, string $message = '') Check that value is traversable
 * @method static \ArrayAccess|array isArrayAccessible(mixed $value, string $message = '') Check that value is array accessible
 * @method static \Countable isCountable(mixed $value, string $message = '') Check that value is countable
 * @method static iterable isIterable(mixed $value, string $message = '') Check that value is iterable
 * @method static T isInstanceOf(mixed $value, class-string<T>|T $class, string $message = '') Check that value is instance of class
 * @method static mixed notInstanceOf(mixed $value, string|object $class, string $message = '') Check that value is not instance of class
 * @method static object isInstanceOfAny(mixed $value, array $classes, string $message = '') Check that value is instance of any class
 * @method static T|class-string<T> isAOf(object|string $value, class-string<T> $class, string $message = '') Check that value is class or parent
 * @method static mixed isNotA(object|string $value, string $class, string $message = '') Check that value is not class or parent
 * @method static object|string isAnyOf(object|string $value, array $classes, string $message = '') Check that value is any of classes
 * @method static null|array|string isEmpty(mixed $value, string $message = '') Check that value is empty
 * @method static mixed notEmpty(mixed $value, string $message = '') Check that value is not empty
 * @method static null null(mixed $value, string $message = '') Check that value is null
 * @method static mixed notNull(mixed $value, string $message = '') Check that value is not null
 * @method static true true(mixed $value, string $message = '') Check that value is true
 * @method static false false(mixed $value, string $message = '') Check that value is false
 * @method static mixed notFalse(mixed $value, string $message = '') Check that value is not false
 * @method static string ip(mixed $value, string $message = '') Check that value is valid IP address
 * @method static string ipv4(mixed $value, string $message = '') Check that value is valid IPv4 address
 * @method static string ipv6(mixed $value, string $message = '') Check that value is valid IPv6 address
 * @method static string email(mixed $value, string $message = '') Check that value is valid email address
 * @method static array uniqueValues(array $values, string $message = '') Check that array contains unique values
 * @method static mixed eq(mixed $value, mixed $expect, string $message = '') Check that two values are equal
 * @method static mixed notEq(mixed $value, mixed $expect, string $message = '') Check that two values are not equal
 * @method static mixed same(mixed $value, mixed $expect, string $message = '') Check that two values are identical
 * @method static mixed notSame(mixed $value, mixed $expect, string $message = '') Check that two values are not identical
 * @method static numeric greaterThan(mixed $value, mixed $limit, string $message = '') Check that value is greater than limit
 * @method static numeric greaterThanEq(mixed $value, mixed $limit, string $message = '') Check that value is greater than or equal to limit
 * @method static numeric lessThan(mixed $value, mixed $limit, string $message = '') Check that value is less than limit
 * @method static numeric lessThanEq(mixed $value, mixed $limit, string $message = '') Check that value is less than or equal to limit
 * @method static numeric range(mixed $value, mixed $min, mixed $max, string $message = '') Check that value is within range
 * @method static mixed oneOf(mixed $value, array $values, string $message = '') Check that value is one of a list of values
 * @method static mixed inArray(mixed $value, array $values, string $message = '') Check that value is in array
 * @method static string contains(string $value, string $subString, string $message = '') Check that string contains substring
 * @method static string notContains(string $value, string $subString, string $message = '') Check that string does not contain substring
 * @method static string notWhitespaceOnly(string $value, string $message = '') Check that string is not whitespace only
 * @method static string startsWith(string $value, string $prefix, string $message = '') Check that string starts with prefix
 * @method static string notStartsWith(string $value, string $prefix, string $message = '') Check that string does not start with prefix
 * @method static string startsWithLetter(mixed $value, string $message = '') Check that string starts with a letter
 * @method static string endsWith(string $value, string $suffix, string $message = '') Check that string ends with suffix
 * @method static string notEndsWith(string $value, string $suffix, string $message = '') Check that string does not end with suffix
 * @method static string regex(string $value, string $pattern, string $message = '') Check that string matches regular expression
 * @method static string notRegex(string $value, string $pattern, string $message = '') Check that string does not match regular expression
 * @method static string unicodeLetters(mixed $value, string $message = '') Check that string contains only Unicode letters
 * @method static string alpha(mixed $value, string $message = '') Check that string contains only letters
 * @method static string digits(string $value, string $message = '') Check that string contains only digits
 * @method static string alnum(string $value, string $message = '') Check that string contains only letters and digits
 * @method static lowercase-string lower(string $value, string $message = '') Check that string contains only lowercase characters
 * @method static uppercase-string upper(string $value, string $message = '') Check that string contains only uppercase characters
 * @method static string length(string $value, int $length, string $message = '') Check that string has exact length
 * @method static string minLength(string $value, int|float $min, string $message = '') Check that string length is at least min
 * @method static string maxLength(string $value, int|float $max, string $message = '') Check that string length is at most max
 * @method static string lengthBetween(string $value, int|float $min, int|float $max, string $message = '') Check that string length is between min and max
 * @method static string fileExists(mixed $value, string $message = '') Check that file exists
 * @method static string file(mixed $value, string $message = '') Check that value is a file
 * @method static string directory(mixed $value, string $message = '') Check that value is a directory
 * @method static string readable(string $value, string $message = '') Check that value is readable
 * @method static string writable(string $value, string $message = '') Check that value is writable
 * @method static class-string classExists(mixed $value, string $message = '') Check that class exists
 * @method static class-string<T> subclassOf(mixed $value, class-string<T>|T $class, string $message = '') Check that class is subclass of
 * @method static class-string interfaceExists(mixed $value, string $message = '') Check that interface exists
 * @method static class-string<T> implementsInterface(mixed $value, class-string<T> $interface, string $message = '') Check that class implements interface
 * @method static mixed propertyExists(string|object $classOrObject, mixed $property, string $message = '') Check that property exists
 * @method static mixed propertyNotExists(string|object $classOrObject, mixed $property, string $message = '') Check that property does not exist
 * @method static mixed methodExists(string|object $classOrObject, mixed $method, string $message = '') Check that method exists
 * @method static mixed methodNotExists(string|object $classOrObject, mixed $method, string $message = '') Check that method does not exist
 * @method static array keyExists(array $array, string|int $key, string $message = '') Check that key exists in array
 * @method static array keyNotExists(array $array, string|int $key, string $message = '') Check that key does not exist in array
 * @method static array-key validArrayKey(mixed $value, string $message = '') Check that value is valid array key
 * @method static array|\Countable count(array|\Countable $array, int $number, string $message = '') Check that array has specific count
 * @method static array|\Countable minCount(array|\Countable $array, int|float $min, string $message = '') Check that array has min count
 * @method static array|\Countable maxCount(array|\Countable $array, int|float $max, string $message = '') Check that array has max count
 * @method static array|\Countable countBetween(array|\Countable $array, int|float $min, int|float $max, string $message = '') Check that array count is between min and max
 * @method static array isList(mixed $array, string $message = '') Check that array is list
 * @method static non-empty-array isNonEmptyList(mixed $array, string $message = '') Check that array is non-empty list
 * @method static array<string, mixed> isMap(mixed $array, string $message = '') Check that array is map
 * @method static non-empty-array<string, mixed> isNonEmptyMap(mixed $array, string $message = '') Check that array is non-empty map
 * @method static string uuid(string $value, string $message = '') Check that string is valid UUID
 * @method static void throws(\Closure $expression, string $class = 'Exception', string $message = '') Check that closure throws exception
 */
class Guard
{
    public static function __callStatic(string $method, array $args): mixed
    {
        if (!method_exists(Assert::class, $method)) {
            throw new Error(sprintf('Call to undefined method %s::%s()', static::class, $method));
        }

        try {
            Assert::$method(...$args);
        } catch (InvalidArgumentException $e) { // @phpstan-ignore-line catch.neverThrown
            throw new GuardClausesException($e->getMessage(), 0);
        }

        return $args[0];
    }
}
