<?php
/**
 * Shoppy Touch
 *
 * @version   1.0
 * @author    Julien Guittard <julien@shoppytouch.com>
 * @see       https://github.com/shoppytouch/shoppytouch-api for the canonical source repository
 * @copyright Copyright (c) 2017 Shoppy Touch. (https://shoppytouch.com)
 */

namespace ShoppyTouch\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Zend\Expressive\Doctrine\Entity\EntityInterface;

/**
 * Class Shop
 *
 * @package ShoppyTouch\Domain\Entity
 */
class Shop implements EntityInterface
{
    use EntityTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var Collection
     */
    private $employees;

    /**
     * @var Collection
     */
    private $managers;

    /**
     * @var User\Owner
     */
    private $owner;

    /**
     * Shop constructor.
     */
    public function __construct()
    {
        $this->employees = new ArrayCollection();
        $this->managers = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Shop
     */
    public function setName(string $name): Shop
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Shop
     */
    public function setAddress(Address $address): Shop
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    /**
     * @param Collection $employees
     * @return Shop
     */
    public function setEmployees(Collection $employees): Shop
    {
        $this->employees = $employees;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getManagers(): Collection
    {
        return $this->managers;
    }

    /**
     * @param Collection $managers
     * @return Shop
     */
    public function setManagers(Collection $managers): Shop
    {
        $this->managers = $managers;
        return $this;
    }

    /**
     * @return User\Owner
     */
    public function getOwner(): User\Owner
    {
        return $this->owner;
    }

    /**
     * @param User\Owner $owner
     * @return Shop
     */
    public function setOwner(User\Owner $owner): Shop
    {
        $this->owner = $owner;
        return $this;
    }
}
