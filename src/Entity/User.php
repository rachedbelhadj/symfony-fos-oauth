<?php
/**
 *  * @author      Rached BELHADJ <belhadj.rached@gmail.com>
 *  * @copyright   Copyright (c) ShortCut
 *  * @license     Proprietary
 *
 */

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={
 *     @ORM\Index(name="search_idx_username", columns={"username"}),
 *     @ORM\Index(name="search_idx_email", columns={"email"}),
 * })
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 *
 * @UniqueEntity(fields={"email"}, message="EMAIL_IS_ALREADY_IN_USE")
 *
 * @Serializer\ExclusionPolicy("all")
 */
class User extends BaseUser
{
    const ROLE_SUPER_ADMIN = "ROLE_SUPER_ADMIN";
    const ROLE_ADMIN = "ROLE_ADMIN";
    const ROLE_USER = "ROLE_USER";

    /**
     * To validate supported roles
     *
     * @var array
     */
    static public $ROLES_SUPPORTED = array(
        self::ROLE_SUPER_ADMIN => self::ROLE_SUPER_ADMIN,
        self::ROLE_ADMIN => self::ROLE_ADMIN,
        self::ROLE_USER => self::ROLE_USER,
    );

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="FIELD_CAN_NOT_BE_EMPTY")
     * @Assert\Email(
     *     message = "INCORRECT_EMAIL_ADDRESS",
     *     checkMX = true
     * )
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=100, nullable=true)
     *
     * @Assert\Length(
     *      min = 1,
     *      max = 100,
     *      minMessage = "FIELD_LENGTH_TOO_SHORT",
     *      maxMessage = "FIELD_LENGTH_TOO_LONG"
     * )
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=true)
     *
     * @Assert\Length(
     *      min = 1,
     *      max = 100,
     *      minMessage = "FIELD_LENGTH_TOO_SHORT",
     *      maxMessage = "FIELD_LENGTH_TOO_LONG"
     * )
     */
    private $lastName;


    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean")
     *
     * @Assert\Type(
     *     type="bool",
     *     message="FIELD_MUST_BE_BOOLEAN_TYPE"
     * )
     */
    private $deleted;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->deleted = false;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return User
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}