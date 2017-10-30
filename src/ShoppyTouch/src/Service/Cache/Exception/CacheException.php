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

use Doctrine\Common\Cache\Cache as DoctrineCache;
use RuntimeException;
use Psr\SimpleCache\CacheException as PsrCacheException;

/**
 * Class CacheException
 *
 * @package ShoppyTouch\Service\Cache\Exception
 */
final class CacheException extends RuntimeException implements PsrCacheException
{
    public static function fromNonClearableCache(DoctrineCache $cache) : self
    {
        return new self(sprintf(
            'The given cache %s was not clearable, but you tried to use a feature that requires a clearable cache.',
            get_class($cache)
        ));
    }

    public static function fromNonMultiOperationCache(DoctrineCache $cache) : self
    {
        return new self(sprintf(
            'The given cache %s does not support multiple operations, '
            . 'but you tried to use a feature that requires a multi-operation cache.',
            get_class($cache)
        ));
    }
}
