<?php
/**
 * Shoppy Touch
 *
 * @version   1.0
 * @author    Julien Guittard <julien@shoppytouch.com>
 * @see       https://github.com/shoppytouch/shoppytouch-api for the canonical source repository
 * @copyright Copyright (c) 2017 Shoppy Touch. (https://shoppytouch.com)
 */

use Ramsey\Uuid\Doctrine\UuidType;

return [
    'dependencies' => [
        'aliases' => [
            'doctrine.entity_manager.orm_default' => Doctrine\ORM\EntityManagerInterface::class,
        ],
    ],
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'driverClass' => Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                    'driverOptions' => [
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8, sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))",
                    ],
                ],
            ],
        ],
        'configuration' => [
            'orm_default' => [
                'proxy_dir' => 'data/orm/proxies',
                'proxy_namespace' => 'Doctrine\Proxy',
            ],
        ],
        'driver' => [
            'orm_default' => [
                'class' => Doctrine\ORM\Mapping\Driver\XmlDriver::class,
                'paths' => __DIR__ . '/../../doctrine/',
            ],
        ],
        'cache' => [
            'memcached' => [
                'class' => \Doctrine\Common\Cache\MemcachedCache::class,
                'instance' => 'memcached_alias',
                'namespace' => 'ShoppyTouchCache',
            ],
        ],
        'types' => [
            UuidType::NAME => UuidType::class,
        ],
        'migrations_configuration' => [
            'orm_default' => [
                'directory' => 'data/orm/migrations',
                'name'      => 'Doctrine Database Migrations',
                'namespace' => 'Doctrine\Migrations',
                'table'     => 'doctrine_migrations',
                'column'    => 'version',
            ]
        ],
        'fixture' => [
            'Fixtures' => __DIR__ . '/../../../src/ShoppyTouch/src/Fixture',
        ],
        'hydrators' => [
        ],
    ],
];