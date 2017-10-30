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

use Zend\Expressive\Doctrine\Entity\EntityInterface;

/**
 * Class Address
 *
 * @package ShoppyTouch\Domain\Entity
 */
class Address implements EntityInterface
{
    use EntityTrait;

    /**
     * First line of the address
     *
     * @var string
     */
    private $addressLine1;

    /**
     * Second line of the address
     *
     * @var string|null
     */
    private $addressLine2;

    /**
     * Locality of the address
     *
     * @var string
     */
    private $locality;

    /**
     * Postal code of the address
     *
     * @var string
     */
    private $postalCode;

    /**
     * Country of the address (ISO-3601 two letters)
     *
     * @var string
     */
    private $countryCode;

    /**
     * @return string
     */
    public function getAddressLine1(): string
    {
        return $this->addressLine1;
    }

    /**
     * @param string $addressLine1
     * @return Address
     */
    public function setAddressLine1(string $addressLine1): Address
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @param null|string $addressLine2
     * @return Address
     */
    public function setAddressLine2(?string $addressLine2): Address
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocality(): string
    {
        return $this->locality;
    }

    /**
     * @param string $locality
     * @return Address
     */
    public function setLocality(string $locality): Address
    {
        $this->locality = $locality;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return Address
     */
    public function setPostalCode(string $postalCode): Address
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return Address
     */
    public function setCountryCode(string $countryCode): Address
    {
        $this->countryCode = $countryCode;
        return $this;
    }
}
