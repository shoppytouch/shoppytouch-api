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

use Memcached;
use Psr\Container\ContainerInterface;

/**
 * Class MemcachedFactory
 *
 * @package ShoppyTouch\Service\Cache
 */
class MemcachedFactory
{
    public function __invoke(ContainerInterface $container): Memcached
    {
        $config = $container->get('Config');
        $cacheConfig = $config['cache'];

        $memcached = new Memcached();
        $memcached->addServer($cacheConfig['host'], $cacheConfig['port']);

        return $memcached;
    }
}
