<?php
/**
 * Shoppy Touch
 *
 * @version   1.0
 * @author    Julien Guittard <julien@shoppytouch.com>
 * @see       https://github.com/shoppytouch/shoppytouch-api for the canonical source repository
 * @copyright Copyright (c) 2017 Shoppy Touch. (https://shoppytouch.com)
 */

namespace ShoppyTouch\Domain\Entity\Product;

use ShoppyTouch\Domain\Entity\EntityTrait;
use Zend\Expressive\Doctrine\Entity\EntityInterface;

/**
 * Class Product
 *
 * @package ShoppyTouch\Domain\Entity\Product
 */
abstract class AbstractProduct implements EntityInterface
{
    use EntityTrait;

    /**
     * Designation of the product
     *
     * @var string
     */
    protected $designation;

    /**
     * Description of the product
     *
     * @var string
     */
    protected $description;

    /**
     * SKU of the product
     *
     * @var string
     */
    protected $sku;

    /**
     * EAN13 code of the product
     *
     * @var string
     */
    protected $ean13;

    /**
     * Brand of the product
     *
     * @var Brand
     */
    protected $brand;

    /**
     * Price of the product
     *
     * @var int
     */
    protected $price;

    /**
     * VAT of the product
     *
     * @var float
     */
    protected $vat;

    /**
     * Size of the product
     *
     * @var string
     */
    protected $size;

    /**
     * Is the product published
     *
     * @var bool
     */
    protected $published;

    /**
     * Is the product active
     *
     * @var bool
     */
    protected $active;
}
