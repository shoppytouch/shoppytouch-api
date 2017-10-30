<?php
/**
 * Shoppy Touch
 *
 * @version   1.0
 * @author    Julien Guittard <julien@shoppytouch.com>
 * @see       https://github.com/shoppytouch/shoppytouch-api for the canonical source repository
 * @copyright Copyright (c) 2017 Shoppy Touch. (https://shoppytouch.com)
 */

namespace ShoppyTouch\Service\Cache\Exception;

use Psr\SimpleCache\InvalidArgumentException as PsrInvalidArgumentException;

/**
 * Class InvalidArgumentException
 *
 * @package ShoppyTouch\Service\Cache\Exception
 */
final class InvalidArgumentException extends \InvalidArgumentException implements PsrInvalidArgumentException
{
    public static function fromKeyAndInvalidTTL(string $key, $ttl) : self
    {
        return new self(sprintf(
            'TTL for "%s" should be defined by an integer or a DateInterval, but %s is given.',
            $key,
            is_object($ttl) ? get_class($ttl) : gettype($ttl)
        ));
    }

    public static function fromInvalidKeyCharacters(string $invalidKey) : self
    {
        return new self(sprintf(
            'Key "%s" is in an invalid format - must not contain characters: {}()/\@:',
            $invalidKey
        ));
    }

    public static function fromInvalidType($invalidKey) : self
    {
        return new self(sprintf(
            'Key was not a valid type. Expected string, received %s',
            is_object($invalidKey) ? get_class($invalidKey) : gettype($invalidKey)
        ));
    }

    public static function fromEmptyKey() : self
    {
        return new self('Requested key was an empty string.');
    }

    public static function fromNonIterableKeys($invalidKeys) : self
    {
        return new self(sprintf(
            'Keys passed were not iterable (i.e. \Traversable or array), received: %s',
            is_object($invalidKeys) ? get_class($invalidKeys) : gettype($invalidKeys)
        ));
    }

    public static function fromNonIterableValues($invalidValues) : self
    {
        return new self(sprintf(
            'Values passed were not iterable (i.e. \Traversable or array), received: %s',
            is_object($invalidValues) ? get_class($invalidValues) : gettype($invalidValues)
        ));
    }
}
