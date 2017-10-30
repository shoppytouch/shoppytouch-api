<?php
/**
 * Shoppy Touch
 *
 * @version   1.0
 * @author    Julien Guittard <julien@shoppytouch.com>
 * @see       https://github.com/shoppytouch/shoppytouch-api for the canonical source repository
 * @copyright Copyright (c) 2017 Shoppy Touch. (https://shoppytouch.com)
 */

namespace ShoppyTouch\Service\Cache;

use Doctrine\Common\Cache\Cache as DoctrineCache;
use Psr\Container\ContainerInterface;

/**
 * Class CacheAdapterFactory
 *
 * @package ShoppyTouch\Service\Cache
 */
class CacheAdapterFactory
{
    /**
     * @param ContainerInterface $container
     * @return SimpleCacheAdapter
     */
    public function __invoke(ContainerInterface $container): SimpleCacheAdapter
    {
        /** @var DoctrineCache $cache */
        $cache = $container->get('doctrine.cache.memcached');

        return new SimpleCacheAdapter($cache);
    }
}
