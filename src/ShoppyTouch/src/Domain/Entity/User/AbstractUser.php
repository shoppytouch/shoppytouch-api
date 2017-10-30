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

use DateTime;
use ShoppyTouch\Domain\Entity\EntityTrait;
use ShoppyTouch\Domain\Entity\Registration;
use Zend\Expressive\Doctrine\Entity\EntityInterface;

/**
 * Class User
 *
 * @package ShoppyTouch\Domain\Entity\User
 */
abstract class AbstractUser implements EntityInterface
{
    use EntityTrait;

    /**
     * First name of the user
     *
     * @var string
     */
    protected $firstName;

    /**
     * Last name of the user
     *
     * @var string
     */
    protected $lastName;

    /**
     * Email of the user
     *
     * @var string
     */
    protected $email;

    /**
     * Password of the user
     *
     * @var string
     */
    protected $password;

    /**
     * Gender of the user
     *
     * @var string
     */
    protected $gender;

    /**
     * @var DateTime
     */
    protected $dob;

    /**
     * @var Registration
     */
    protected $registration;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return AbstractUser
     */
    public function setFirstName(string $firstName): AbstractUser
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return AbstractUser
     */
    public function setLastName(string $lastName): AbstractUser
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return AbstractUser
     */
    public function setEmail(string $email): AbstractUser
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return AbstractUser
     */
    public function setPassword(string $password): AbstractUser
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return AbstractUser
     */
    public function setGender(string $gender): AbstractUser
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDob(): DateTime
    {
        return $this->dob;
    }

    /**
     * @param DateTime $dob
     * @return AbstractUser
     */
    public function setDob(DateTime $dob): AbstractUser
    {
        $this->dob = $dob;
        return $this;
    }

    /**
     * @return Registration
     */
    public function getRegistration(): Registration
    {
        return $this->registration;
    }

    /**
     * @param Registration $registration
     * @return AbstractUser
     */
    public function setRegistration(Registration $registration): AbstractUser
    {
        $this->registration = $registration;
        return $this;
    }
}
