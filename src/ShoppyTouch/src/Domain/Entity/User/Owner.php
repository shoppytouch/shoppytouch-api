<?php
/**
 * Shoppy Touch
 *
 * @version   1.0
 * @author    Julien Guittard <julien@shoppytouch.com>
 * @see       https://github.com/shoppytouch/shoppytouch-api for the canonical source repository
 * @copyright Copyright (c) 2017 Shoppy Touch. (https://shoppytouch.com)
 */

namespace ShoppyTouch\Domain\Entity\User;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class Owner
 *
 * @package ShoppyTouch\Domain\Entity\User
 */
class Owner extends AbstractUser
{
    /**
     * Shops owned by owner
     *
     * @var Collection
     */
    private $shops;

    /**
     * Owner constructor.
     */
    public function __construct()
    {
        $this->shops = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getShops(): Collection
    {
        return $this->shops;
    }
}
