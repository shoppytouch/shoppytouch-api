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

use DateTime;
use Ramsey\Uuid\UuidInterface;

/**
 * Trait EntityTrait
 *
 * @package ShoppyTouch\Domain\Entity
 */
trait EntityTrait
{
    /**
     * Unique ID of the entity
     *
     * @var UuidInterface
     */
    private $id;

    /**
     * Timestamp of the entity creation
     *
     * @var DateTime
     */
    private $createdAt;

    /**
     * Timestamp of the entity update
     *
     * @var DateTime|null
     */
    private $updatedAt;

    /**
     * Return the unique ID
     *
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * Set the unique ID
     *
     * @param UuidInterface $id
     * @return EntityTrait
     */
    public function setId(UuidInterface $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Return the timestamp of the entity creation
     *
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set the timestamp of the entity creation
     *
     * @param DateTime $createdAt
     * @return EntityTrait
     */
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Return the timestamp of the entity update
     *
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Set the timestamp of the entity update
     *
     * @param DateTime|null $updatedAt
     * @return EntityTrait
     */
    public function setUpdatedAt(?DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Set the timestamp of the entity creation upon entity lifecycle
     */
    public function timestampOnCreate(): void
    {
        if (! $this->createdAt) {
            $this->createdAt = new DateTime();
        }
    }
}
