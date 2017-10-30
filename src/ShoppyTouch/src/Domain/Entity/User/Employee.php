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
 * Class Employee
 *
 * @package ShoppyTouch\Domain\Entity\User
 */
class Employee extends AbstractUser
{
    /**
     * Shops where employee works
     *
     * @var Collection
     */
    private $shops;

    /**
     * Employee constructor.
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

    /**
     * @param Collection $shops
     * @return Employee
     */
    public function setShops(Collection $shops): Employee
    {
        $this->shops = $shops;
        return $this;
    }
}
