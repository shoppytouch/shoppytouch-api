<?php
/**
 * Shoppy Touch
 *
 * @version   1.0
 * @author    Julien Guittard <julien@shoppytouch.com>
 * @see       https://github.com/shoppytouch/shoppytouch-api for the canonical source repository
 * @copyright Copyright (c) 2017 Shoppy Touch. (https://shoppytouch.com)
 */

use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

$cacheConfig = [
    'config_cache_path' => 'data/cache/config.php',
];

$aggregator = new ConfigAggregator([
    \Zend\Expressive\Doctrine\ConfigProvider::class,
    ShoppyTouch\ConfigProvider::class,
    new ArrayProvider($cacheConfig),
    new PhpFileProvider('config/autoload/{global,local}/*.php'),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();