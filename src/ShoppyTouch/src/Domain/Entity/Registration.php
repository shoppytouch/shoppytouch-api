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

use DateInterval;
use DateTime;
use Zend\Expressive\Doctrine\Entity\EntityInterface;

/**
 * Class Registration
 *
 * @package ShoppyTouch\Domain\Entity
 */
class Registration implements EntityInterface
{
    use EntityTrait;

    /**
     * Reference of the registration
     *
     * @var string
     */
    private $reference;

    /**
     * User bound to the registration
     *
     * @var User\AbstractUser
     */
    private $user;

    /**
     * Is the registration already consumed
     *
     * @var bool
     */
    private $consumed;

    /**
     * Return the reference of the registration
     *
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * Set the reference of the registration
     *
     * @param string $reference
     * @return Registration
     */
    public function setReference(string $reference): Registration
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Get the user bound to the registration
     *
     * @return User\AbstractUser
     */
    public function getUser(): User\AbstractUser
    {
        return $this->user;
    }

    /**
     * Set the user bound to the registration
     *
     * @param User\AbstractUser $user
     * @return Registration
     */
    public function setUser(User\AbstractUser $user): Registration
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Return the consumable status of the registration
     *
     * @return bool
     */
    public function isConsumed(): bool
    {
        return $this->consumed;
    }

    /**
     * Set the consumable status of the registration
     *
     * @param bool $consumed
     * @return Registration
     */
    public function setConsumed(bool $consumed): Registration
    {
        $this->consumed = $consumed;
        return $this;
    }

    /**
     * Is the registration already expired?
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        $createdAt = clone $this->createdAt;
        $createdAt->add(new DateInterval('P2D'));
        return $createdAt <= new DateTime();
    }
}
